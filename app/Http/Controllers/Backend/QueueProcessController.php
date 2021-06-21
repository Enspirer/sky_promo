<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QueueProcess;
use DB;
use DataTables;

class QueueProcessController extends Controller
{
    public function index()
    {
       return view('backend.queue_process.index');
    }

    public function GetTableDetails(Request $request)
    {
        
        if($request->ajax())
        {
            $data = DB::table('jobs')->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }
}
