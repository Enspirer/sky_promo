<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\EmailBuilk;

class EmailBuilkController extends Controller
{
    public function index()
    {
        return view('backend.email_bulk.index');
    }

    public function GetDetableDetails()
    {
        $category = EmailBuilk::all();

        return Datatables::of($category)

            ->addColumn('action', function ($row) {
                $btn = '<a href="" class="edit btn btn-primary btn-sm" style="margin-right: 10px"><i class="fa fa-edit"></i> Edit </a>';
                $btn2 = '<a href="" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>';
                return  $btn . $btn2;
            })
            ->rawColumns(['action'])
            ->make();
    }
}
