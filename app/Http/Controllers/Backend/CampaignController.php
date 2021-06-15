<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailCampaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
       return view('backend.campaign.index');
    }

    public function create()
    {
        return view('backend.campaign.creator');
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
            'company_name' => $request->company_name1,
            'advertisement_name' => $request->company_name1,
            'image' => $image_url1,
        ];



        if($request->file('email_image2'))
        {
            $preview_fileName2 = time().'.'.$request->email_image2->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->email_image2->move(public_path('files/email_promo'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $image_url2 = null;
        }
        $company_name2 = [
            'company_name' => $request->company_name2,
            'advertisement_name' => $request->company_name2,
            'image' => $image_url2,
        ];


        if($request->file('email_image3'))
        {
            $preview_fileName3 = time().'.'.$request->email_image3->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->email_image3->move(public_path('files/email_promo'), $preview_fileName3);
            $image_url = $preview_fileName3;
        }else{
            $image_url = null;
        }
        $company_name3 = [
            'company_name' => $request->company_name3,
            'advertisement_name' => $request->company_name3,
            'image' => $image_url,
        ];

        $out_json = [
            $company_name1,$company_name2,$company_name3
        ];






        dd($out_json);
    }
}
