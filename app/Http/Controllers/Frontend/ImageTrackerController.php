<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailCampaign;

class ImageTrackerController extends Controller
{
    
    public function track_image()
    {
   
        $countviews = new EmailCampaign;
        
        return response( file_get_contents('./img/3.jpg') ) ->header('Content-Type','image/png');
        
    }
}
