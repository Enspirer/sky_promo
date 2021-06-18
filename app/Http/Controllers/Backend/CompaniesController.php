<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\CompanyDetails;

class CompaniesController extends Controller
{
    public function index()
    {
        return view('backend.companies.index');
    }

    public function GetTableDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = CompanyDetails::latest()->get();
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

    public function add_company(Request $request)
    {  
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required'
 
        ]);     

        $addcompany = new CompanyDetails;
        $addcompany->company_name=$request->name;
        $addcompany->user_id = auth()->user()->id;
        $addcompany->company_description=$request->description;
        
        // $addcompany->category=$request->category;

        $addcompany->save();

        return back();                      

    }

    public function update_company(Request $request)
    {
    
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);    

        $updatecompany = new CompanyDetails;
        $updatecompany->company_name=$request->name;
        $updatecompany->user_id = auth()->user()->id;
        $updatecompany->company_description=$request->description;
        // dd($request);

        // $updatecompany->save();
        CompanyDetails::whereId($request->hidden_id)->update($updatecompany->toArray());

        return back();                      

    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = CompanyDetails::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function destroy($id)
    {
        $data = CompanyDetails::findOrFail($id);
        $data->delete();
    }

}
