<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\EmailBuilk;
use DB;

class EmailBuilkController extends Controller
{
    public function index()
    {
        return view('backend.email_bulk.index');
    }

    public function add_email(Request $request)
    {
        
        // dd($request);
        $request->validate([
            'email' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);







        

        $addemail = new EmailBuilk;
        $addemail->email=$request->email;
        $addemail->description=$request->description;
        $addemail->category=$request->category;

        

        $addemail->save();

        return back();                      

    }

    public function update_email(Request $request)
    {
    
        $request->validate([
            'email' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $updateemail = new EmailBuilk;
        $updateemail->email=$request->email;
        $updateemail->description=$request->description;
        $updateemail->category=$request->category;
        // dd($request);

        // $updateemail->save();
        EmailBuilk::whereId($request->hidden_id)->update($updateemail->toArray());


        return back();                      

    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'description' => 'required',
    //         'category' => 'required'
    //     ]);

    //     $error = Validator::make($request->all(), $rules);

    //     if($error->fails())
    //     {
    //         return response()->json(['errors' => $error->errors()->all()]);
    //     }

    //     $form_data = array(
    //         'email'        =>  $request->email,
    //         'description'         =>  $request->description,
    //         'category'         =>  $request->category
    //     );

    //     EmailBuilk::create($form_data);

    //     return response()->json(['success' => 'Data Added successfully.']);
    //     return back(); 

    // }

    // public function GetDetableDetails()
    // {
    //     $category = EmailBuilk::all();

    //     return Datatables::of($category)

    //         ->addColumn('action', function ($row) {
    //             $btn = '<a href="" class="edit btn btn-primary btn-sm" style="margin-right: 10px"><i class="fa fa-edit"></i> Edit </a>';
    //             $btn2 = '<a href="" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>';
    //             return  $btn . $btn2;
    //         })
    //         ->rawColumns(['action'])
    //         ->make();
    // }

    public function GetDetableDetails(Request $request)
    {
        if($request->ajax())
        {
            $lsime = DB::table('email_builks')->orderBy('id');
            return DataTables::of($lsime)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = EmailBuilk::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    
    public function destroy($id)
    {
        $data = EmailBuilk::findOrFail($id);
        $data->delete();
    }

}
