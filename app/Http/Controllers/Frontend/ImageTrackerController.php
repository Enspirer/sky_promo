<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailCampaign;
use App\Models\CampaignStatics;
use DB;

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
            // else {
                
            //         // $msg = 'Image Not Found';
            //         // return ($msg);
            //         return view('errors.404');
                   
            // }
        }              
        
        // return response( file_get_contents('./img/3.jpg') ) ->header('Content-Type','image/png');
        
    }
}
