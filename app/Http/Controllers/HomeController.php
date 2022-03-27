<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArenaOverview;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $site = $request->site;
        
        if ($from) {
            $from = date('Y-m-d', strtotime($from));
        } else {
            $from = date('Y-m-d', strtotime('-5 days',time()));
        }

        if ($to) {
            $to = date('Y-m-d', strtotime($to));
        } else {
            $to = date('Y-m-d', time());
        }

        if ($request->isMethod('post')) {
            $arenaOverview = ArenaOverview::whereBetween('date', [$from . ' 00:00:00', $to . ' 23:59:59']);
    
            if ($site != 'all') {
                $arenaOverview = $arenaOverview->where('site', $site);    
            } 
    
            $arenaOverview = $arenaOverview->get();
        } else {
            $arenaOverview = ArenaOverview::all();
        }

        return view('home', [
            'arenaOverview' => $arenaOverview
        ]);
    }
}
