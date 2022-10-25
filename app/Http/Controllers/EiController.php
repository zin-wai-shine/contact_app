<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Exports\SingleExport;
use App\Imports\ContactImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EiController extends Controller
{
    public function export()
    {
        return Excel::download(new ContactExport(), 'contacts.csv');
    }

    public function singleExport ($id){
        return Excel::download(new SingleExport($id), 'contact.csv');
    }

    // Import

    public function import(Request $request){
        $request->validate([
            'csv_file' => 'required|mimes:csv'
        ]);
         Excel::import(new ContactImport, $request->file('csv_file'));
         return redirect()->route('contact.index');
    }
}
