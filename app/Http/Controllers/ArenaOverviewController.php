<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArenaOverviewImport;

class ArenaOverviewController extends Controller
{
    public function store(Request $request) {
        Excel::import(new ArenaOverviewImport(), $request->file('import_file'));
        return redirect('home');
    }
}
