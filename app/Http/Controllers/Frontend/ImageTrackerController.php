<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailCampaign;
use App\Models\CampaignStatics;
use App\Models\SingleCampaign;
use App\Models\SingleCampaignStatics;
use DB;
use \App\Mail\SendEmailPromo;

class ImageTrackerController extends Controller
{
    
    public function track_image($id,$image_id)
    {
        
        $countviews = new CampaignStatics;
          
        $camp = EmailCampaign::whereId($id)->first();

        // $count = 0;   
        // $count = $count + 1 ;

        $json_data = json_decode($camp->json_data); 
       
        
        foreach($json_data as $key => $jsondata){
            
            // dd($key);
            if($key == $image_id){
                
                // $countviews->email_view_count=$count;

                CampaignStatics::where('campaign_id', $id)
                ->update([
                'email_view_count'=> DB::raw('email_view_count+1')
                ]);


                // CampaignStatics::whereId($id)->update($countviews->toArray());

                return response( file_get_contents('./files/email_promo/'.$jsondata->image) ) ->header('Content-Type','image/png');
                
            }
            
        }              
                
    }

    public function track_email_send($id)
    {   
        \Mail::to('laraveltest@yopmail.com')->send(new SendEmailPromo($id));
        return ("Campaign Id: $id email sent");                   
                
    }


    public function single_track_image($id,$image_id)
    {
        
        $countviews = new SingleCampaignStatics;
          
        $camp = SingleCampaign::whereId($id)->first();

        $json_data = json_decode($camp->json_data); 
        
        foreach($json_data as $key => $jsondata){
            
            // dd($key);
            if($key == $image_id){
                
                SingleCampaignStatics::where('campaign_id', $id)
                ->update([
                'read_count'=> DB::raw('read_count+1')
                ]);

                return response( file_get_contents('./files/single_mail/'.$jsondata->image) ) ->header('Content-Type','image/png');
                
            }
            
        }              
                
    }


    public function single_track_url($id,$url_id)
    {
        
        $countviews = new SingleCampaignStatics;
          
        $camp = SingleCampaign::whereId($id)->first();

        $json_data = json_decode($camp->json_data); 
        
        foreach($json_data as $key => $jsondata){
            
            // dd($key);
            if($key == $url_id){
                
                SingleCampaignStatics::where('campaign_id', $id)
                ->update([
                'click_count'=> DB::raw('click_count+1')
                ]);

                return redirect( $jsondata->link );
                
            }
            
        }              
                
    }






}
