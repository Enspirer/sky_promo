<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SingleCampaign;
use App\Models\SingleCampaignStatics;
use App\Models\CompanyDetails;
use App\Models\EmailBuilk;
use DB;
use Mail;  
use \App\Mail\SendSingleEmailPromo;


class SingleMailController extends Controller
{
    public function index()
    {
        return view('backend.single_mail.index');
    }

    public function create()
    {
        $data = CompanyDetails::all();

        // $company = DB::table('company_details')->select('id','company_name')->get();

        return view('backend.single_mail.create',[
            'companies' => $data 
        ]);
    }

    public function getDetails()
    {
        $category = SingleCampaign::orderBy('id', 'ASC')->get();

        return Datatables::of($category)

            ->addColumn('action', function ($row) {
               
                $btn = '<a href="'.route('admin.singlemail.show_statics',$row->id).'" class="btn btn-success btn-sm" style="margin-right: 10px"><i class="far fa-chart-bar"></i> View Static </a>';
                $btn2 = '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                               
                return $btn.$btn2;
            })
            ->rawColumns(['action'])
            ->make();

    }

    public function store(Request $request)
    {
        $campaign = new SingleCampaign;
        $campaign->campaign_name = $request->email_campaigns;
        if($request->file('email_image1'))
        {
            $preview_fileName1 = time().'_'.rand(1000,10000).'.'.$request->email_image1->getClientOriginalExtension();
            $fullURLsPreviewFile1 = $request->email_image1->move(public_path('files/single_mail'), $preview_fileName1);
            $image_url1 = $preview_fileName1;
        }else{
            $image_url1 = null;
        }
        $company_name1 = [
            'company_id' => $request->company_name1,
            'advertisement_name' => $request->advertiment_name1,
            'image' => $image_url1,
            'link' => $request->link1,
            'description' => $request->description1,
        ];
        if($request->file('email_image2'))
        {
            $preview_fileName2 = time().'_'.rand(1000,10000).'.'.$request->email_image2->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->email_image2->move(public_path('files/single_mail'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $image_url2 = null;
        }
        $company_name2 = [
            'company_id' => $request->company_name2,
            'advertisement_name' => $request->advertiment_name2,
            'image' => $image_url2,
            'link' => $request->link2,
            'description' => $request->description2,
        ];
        if($request->file('email_image3'))
        {
            $preview_fileName3 = time().'_'.rand(1000,10000).'.'.$request->email_image3->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->email_image3->move(public_path('files/single_mail'), $preview_fileName3);
            $image_url = $preview_fileName3;
        }else{
            $image_url = null;
        }
        $company_name3 = [
            'company_id' => $request->company_name3,
            'advertisement_name' => $request->advertiment_name3,
            'image' => $image_url,
            'link' => $request->link3,
            'description' => $request->description3,
        ];
        $out_json = [
            $company_name1,$company_name2,$company_name3
        ];

        $email_name = [           
            $request->email,
        ];

        $out_json_email = $request->email;  

        $count = count($out_json_email);

        $emailCampaign = new SingleCampaign;
        $emailCampaign->user_id = auth()->user()->id;
        $emailCampaign->json_data = json_encode($out_json);
        $emailCampaign->description = $request->description;
        $emailCampaign->campaign_name = $request->campaign_name;
        $emailCampaign->emails = json_encode($out_json_email);
        $emailCampaign->status = 'Completed';
        $emailCampaign->save();
        $emailStatics = new SingleCampaignStatics;
        $emailStatics->campaign_id = $emailCampaign->id;
        $emailStatics->email = 0;
        $emailStatics->read_count = 0;
        $emailStatics->click_count = 0;
        $emailStatics->is_failed = 0;
        $emailStatics->target_email_count = $count;
        $emailStatics->save();

            foreach ($out_json_email as $singlemailr)            
            {
            // dd($singlemailr);
            \Mail::to($singlemailr)->send(new SendSingleEmailPromo($emailCampaign->id,$emailCampaign->campaign_name));
            }

        return redirect()->route('admin.singlemail.index');
    }

    public function show_statics($id)
    {
        $campaigns = SingleCampaign::where('id',$id)->first();
     
        $statics = SingleCampaignStatics::where('campaign_id',$id)->first();

        $emailcount = 20;
        // dd($emailcount);


        return view('backend.single_mail.show_statics',[
            'statics' => $statics,    
            'campaigns' => $campaigns,
            'emailcount' => $emailcount
            
        ]);   

    }

    public function destroy($id)
    {
        // $data = SingleCampaign::findOrFail($id);
        // $datas = SingleCampaignStatics::findOrFail($id);
        // $data->delete();
        // $datas->delete();

        DB::table('single_campaign_statics')->where('campaign_id', $id)->delete();
        DB::table('single_campaigns')->where('id', $id)->delete();   
    }


}
