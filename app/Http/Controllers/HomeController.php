<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArenaOverview;
use Auth;
use App\UserType;

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
        $user = Auth::user();
        $from = $request->from;
        $to = $request->to;
        $site = $request->site;
        
        if ($from) {
            $from = date('Y-m-d', strtotime($from));
        } 

        if ($to) {
            $to = date('Y-m-d', strtotime($to));
        } 

        if ($request->isMethod('post')) {
            $arenaOverview = ArenaOverview::whereBetween('date', [$from . ' 00:00:00', $to . ' 23:59:59']);
    
            if ($site != 'all') {
                $arenaOverview = $arenaOverview->where('site', $site);    
            } 
    
            $arenaOverview = $arenaOverview->paginate(20);
            $pagination = $arenaOverview->appends(array('value' => 'key'));
        } else {
            $arenaOverview = ArenaOverview::paginate(20);
            $pagination = $arenaOverview->appends(array('value' => 'key'));
        }

        $total_initial_account_point = 0;
        $total_current_agent_wallet = 0;
        $total_current_agent_commission = 0;
        $total_total_loading = 0;
        $total_total_load_withdrawal = 0;
        $total_total_commission_cashout = 0;
        $total_must_total_players_point = 0;
        $total_actual_players_point = 0;
        $total_total_bets = 0;
        $total_total_rake = 0;
        $total_rake_without_agent_commission = 0;
        $total_player_point_difference = 0;
        $total_initial_agent_commission = 0;
        $total_total_agent_commission = 0;
        $total_total_processed_commission = 0;
        $total_total_unprocessed_commission = 0;
        $total_commission_difference = 0;

        $arenaOverviewTable = '';

        foreach($arenaOverview as $value) {
            $total_initial_account_point += $value->initial_account_point;
            $total_current_agent_wallet += $value->current_agent_wallet;
            $total_current_agent_commission += $value->current_agent_commission;
            $total_total_loading += $value->total_loading;
            $total_total_load_withdrawal += $value->total_load_withdrawal;
            $total_total_commission_cashout += $value->total_commission_cashout;
            $total_must_total_players_point += $value->must_total_players_point;
            $total_actual_players_point += $value->actual_players_point;
            $total_total_bets += $value->total_bets;
            $total_total_rake += $value->total_rake;
            $total_rake_without_agent_commission += $value->rake_without_agent_commission;
            $total_player_point_difference += $value->player_point_difference;
            $total_initial_agent_commission += $value->initial_agent_commission;
            $total_total_agent_commission += $value->total_agent_commission;
            $total_total_processed_commission += $value->total_processed_commission;
            $total_total_unprocessed_commission += $value->total_unprocessed_commission;
            $total_commission_difference += $value->commission_difference;

            $arenaOverviewTable .= '<tr>';
            $arenaOverviewTable .= "<td> $value->date </td>";
            $arenaOverviewTable .= "<td> $value->site </td>";
            $arenaOverviewTable .= '<td>'. number_format($value->initial_account_point,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->current_agent_wallet,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->current_agent_commission,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_loading,2)  .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_load_withdrawal,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_commission_cashout,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->must_total_players_point,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->actual_players_point,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_bets,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_rake,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->rake_without_agent_commission,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($total_player_point_difference,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->initial_agent_commission,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_agent_commission,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_processed_commission,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->total_unprocessed_commission,2) .'</td>';
            $arenaOverviewTable .= '<td>'. number_format($value->commission_difference,2) .'</td>';
            $arenaOverviewTable .= '</tr>';
        }

        return view('home', [
            'arenaOverview' => $arenaOverviewTable,
            'userType' => UserType::find($user->type_id)->title,
            'total_initial_account_point' => $total_initial_account_point,
            'total_current_agent_wallet' => $total_current_agent_wallet,
            'total_current_agent_commission' => $total_current_agent_commission,
            'total_total_loading' => $total_total_loading,
            'total_total_load_withdrawal' => $total_total_load_withdrawal,
            'total_total_commission_cashout' => $total_total_commission_cashout,
            'total_must_total_players_point' => $total_must_total_players_point,
            'total_actual_players_point' => $total_actual_players_point,
            'total_total_bets' => $total_total_bets,
            'total_total_rake' => $total_total_rake,
            'total_rake_without_agent_commission' => $total_rake_without_agent_commission,
            'total_player_point_difference' => $total_player_point_difference,
            'total_initial_agent_commission' => $total_initial_agent_commission,
            'total_total_agent_commission' => $total_total_agent_commission,
            'total_total_processed_commission' => $total_total_processed_commission,
            'total_total_unprocessed_commission' => $total_total_unprocessed_commission,
            'total_commission_difference' => $total_commission_difference,
            'pagination' => $pagination,
            'from' => $from == "" ? "" : date('m/d/Y', strtotime($from)),
            'to' => $to == "" ? "" : date('m/d/Y', strtotime($to)),
            'site' => $site
        ]);
    }
}
