<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EmailBuilk;
use Illuminate\Http\Request;
use App\Jobs\SendPromoMailJob;
use DB;

class SendMailController extends Controller
{
    public function index()
    {
        dispatch(new SendPromoMailJob('ssss'));



//

//        EmailBuilk::chunk(100, function ($emailbulk) {
//            foreach ($emailbulk as $emailbulks)
//            {
//                dispatch(new SendPromoMailJob($emailbulks));
//            }
//        });
//        dd('send mail successfully !!');


    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
