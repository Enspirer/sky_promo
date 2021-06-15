<?php

namespace App\Http\Controllers\ImportExportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportContacts;
use App\Exports\ExportContacts;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Models\EmailBuilk;
use App\Contact;

class ImportExportExcelController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportContacts, request()->file('import_file'));
        return back();
    }

    public function export() 
    {
        return Excel::download(new ExportContacts, 'emails.csv');
    }
}
