<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\PromotionEmail;

class PromotionEmailController extends Controller
{
    public function index()
    {
        return view('backend.promotion_email.index');
    }

    public function send_email(Request $request)
    {

        \Mail::to($request->email)->send(new PromotionEmail('Sanjaya Senevirathne','Mr.','This is email address'));

        dd($request);
    }
}
