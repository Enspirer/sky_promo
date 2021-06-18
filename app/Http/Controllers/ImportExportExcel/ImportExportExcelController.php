<?php

namespace App\Http\Controllers\ImportExportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportContacts;
use App\Exports\ExportContacts;
use App\Imports\ImportCompany;
use App\Exports\ExportComapny;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Models\EmailBuilk;
use App\Models\CompanyDetails;
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

    public function importcompany(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportCompany, request()->file('import_file'));
        return back();
    }

    public function exportcompany() 
    {
        return Excel::download(new ExportComapny, 'Companies.csv');
    }
}
