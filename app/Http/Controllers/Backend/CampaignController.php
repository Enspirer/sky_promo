<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CampaignStatics;
use App\Models\EmailCampaign;
use App\Models\EmailBuilk;
use Illuminate\Http\Request;
use DataTables;
use App\Models\CompanyDetails;
use DB;
use App\Jobs\SendPromoMailJob;

class CampaignController extends Controller
{
    public function index()
    {
       return view('backend.campaign.index');
    }

    public function create()
    {
        $data = CompanyDetails::all();

        // $company = DB::table('company_details')->select('id','company_name')->get();

        return view('backend.campaign.creator',[
            'companies' => $data 
        ]);
        // return view('backend.campaign.creator', ['data'=>$data]);
        // return view('backend.campaign.creator');
    }


    public function getDetails()
    {
        $category = EmailCampaign::all();

        return Datatables::of($category)

            ->addColumn('action', function ($row) {
                $btn = '<a href="'.route('admin.campaign.show_statics',$row->id).'" class="btn btn-primary btn-sm" style="margin-right: 10px"><i class="fa fa-eye"></i> View Static </a>';
                // $btn2 = '<a href="'.route('admin.campaign.destroy',$row->id).'" name="delete" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>';
                $btn2 = '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                // $btn3 = '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="fas fa-edit">Edit</i></button>';
                $btn3 = '<a href="'.route('admin.campaign.edit',$row->id).'" name="edit" id="'.$row->id.'" class="edit btn btn-warning btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                // $button = '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-warning btn-sm">Edit</button>';
                return  $btn . $btn2 . $btn3;
            })
            ->rawColumns(['action'])
            ->make();

    }

    public function store(Request $request)
    {
        $campaign = new EmailCampaign;
        $campaign->campaign_name = $request->email_campaigns;
        if($request->file('email_image1'))
        {
            $preview_fileName1 = time().'_'.rand(1000,10000).'.'.$request->email_image1->getClientOriginalExtension();
            $fullURLsPreviewFile1 = $request->email_image1->move(public_path('files/email_promo'), $preview_fileName1);
            $image_url1 = $preview_fileName1;
        }else{
            $image_url1 = null;
        }
        $company_name1 = [
            'company_id' => $request->company_name1,
            'advertisement_name' => $request->advertiment_name1,
            'image' => $image_url1,
            'link' => $request->link1,
        ];
        if($request->file('email_image2'))
        {
            $preview_fileName2 = time().'_'.rand(1000,10000).'.'.$request->email_image2->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->email_image2->move(public_path('files/email_promo'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $image_url2 = null;
        }
        $company_name2 = [
            'company_id' => $request->company_name2,
            'advertisement_name' => $request->advertiment_name2,
            'image' => $image_url2,
            'link' => $request->link2,
        ];
        if($request->file('email_image3'))
        {
            $preview_fileName3 = time().'_'.rand(1000,10000).'.'.$request->email_image3->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->email_image3->move(public_path('files/email_promo'), $preview_fileName3);
            $image_url = $preview_fileName3;
        }else{
            $image_url = null;
        }
        $company_name3 = [
            'company_id' => $request->company_name3,
            'advertisement_name' => $request->advertiment_name3,
            'image' => $image_url,
            'link' => $request->link3,
        ];
        $out_json = [
            $company_name1,$company_name2,$company_name3
        ];
        $emailCampaign = new EmailCampaign;
        $emailCampaign->user_id = auth()->user()->id;
        $emailCampaign->json_data = json_encode($out_json);
        $emailCampaign->description = $request->description;
        $emailCampaign->campaign_name = $request->campaign_name;
        $emailCampaign->status = 'Pending';
        $emailCampaign->save();
        $emailStatics = new CampaignStatics;
        $emailStatics->campaign_id = $emailCampaign->id;
        $emailStatics->user_id = auth()->user()->id;
        $emailStatics->email_view_count = 0;
        $emailStatics->email_send_count = 0;
        $emailStatics->unsubcibe_count = 0;
        $emailStatics->taget_email_count = 0;
        $emailStatics->save();
        return redirect()->route('admin.campaign.index');
    }

    public function update(Request $request)
    {
        $campaign = new EmailCampaign;
        $campaign->campaign_name = $request->email_campaigns;
        
        if($request->file('email_image1'))
        {
            $preview_fileName1 = time().'_'.rand(1000,10000).'.'.$request->email_image1->getClientOriginalExtension();
            $fullURLsPreviewFile1 = $request->email_image1->move(public_path('files/email_promo'), $preview_fileName1);
            $image_url1 = $preview_fileName1;
        }else{
            $image_url1 = null;
        }
        $company_name1 = [
            'company_id' => $request->company_name1,
            'advertisement_name' => $request->advertiment_name1,
            'image' => $image_url1,
        ];
        if($request->file('email_image2'))
        {
            $preview_fileName2 = time().'_'.rand(1000,10000).'.'.$request->email_image2->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->email_image2->move(public_path('files/email_promo'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $image_url2 = null;
        }
        $company_name2 = [
            'company_id' => $request->company_name2,
            'advertisement_name' => $request->advertiment_name2,
            'image' => $image_url2,
        ];
        if($request->file('email_image3'))
        {
            $preview_fileName3 = time().'_'.rand(1000,10000).'.'.$request->email_image3->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->email_image3->move(public_path('files/email_promo'), $preview_fileName3);
            $image_url = $preview_fileName3;
        }else{
            $image_url = null;
        }
        $company_name3 = [
            'company_id' => $request->company_name3,
            'advertisement_name' => $request->advertiment_name3,
            'image' => $image_url,
        ];
        $out_json = [
            $company_name1,$company_name2,$company_name3
        ];
        
        $emailCampaign = new EmailCampaign;
        $emailCampaign->user_id = auth()->user()->id;
        $emailCampaign->json_data = json_encode($out_json);
        $emailCampaign->description = $request->description;
        $emailCampaign->campaign_name = $request->campaign_name;
        $emailCampaign->status = 'Pending';
        // $emailCampaign->save();
        EmailCampaign::whereId($request->id)->update($emailCampaign->toArray());
        $emailStatics = new CampaignStatics;
        $emailStatics->campaign_id = $emailCampaign->id;
        $emailStatics->user_id = auth()->user()->id;
        $emailStatics->email_view_count = 0;
        $emailStatics->email_send_count = 0;
        $emailStatics->unsubcibe_count = 0;
        $emailStatics->taget_email_count = 0;
        // $emailStatics->save();
        CampaignStatics::whereId($request->id)->update($emailStatics->toArray());
        return redirect()->route('admin.campaign.index');
    }

    public function show_statics($id)
    {
        $campaigns = EmailCampaign::where('id',$id)->first();
     
        $statics = CampaignStatics::where('campaign_id',$id)->first();

        $getdetail = DB::table('email_builks')->count();



        // dd($emailcount);


        return view('backend.campaign.show_statics',[
            'statics' => $statics,    
            'campaigns' => $campaigns,
            'emailcount' => $getdetail
            
        ]);   

    }

    public function edit($id)
    {
        // return view('backend.campaign.edit');

        $campaigns = EmailCampaign::where('id',$id)->first() ;
        
        // dd($campaigns);

        // if(request()->ajax())
        // {
        //     $datas = EmailCampaign::findOrFail($id);
        //     return response()->json(['result' => $datas]);
        // }

        $data = CompanyDetails::all();  //for dropdown box

        return view('backend.campaign.edit',[
            'companies' => $data, 
            'campaigns' => $campaigns
        ]);    
    }
    

    public function destroy($id)
    {
        $data = EmailCampaign::findOrFail($id);
        $datas = CampaignStatics::findOrFail($id);
        $data->delete();
        $datas->delete();
    }


    public function start_campaign(Request $request)
    {
        dispatch(new SendPromoMailJob($request->id));
        EmailCampaign::where('id',$request->id)->update([
            'status' => 'Processing'
        ]);
        return back();
    }
    

    
}
