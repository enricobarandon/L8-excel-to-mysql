<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArenaOverviewImport;

class ArenaOverviewController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'import_file' => 'required',
        ]);
        
        $import = Excel::import(new ArenaOverviewImport(), $request->file('import_file'));
        
        if ($import) {
            return redirect('home')->with('success','File successfully imported.');
        } else {
            return redirect('home')->with('error','Something went wrong.');
        }
    }

    public function messages()
    {
        return [
            'import_file.required' => 'A title is required'
        ];
    }
}
