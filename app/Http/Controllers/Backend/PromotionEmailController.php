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
        \Mail::to($request->email)->send(new PromotionEmail($request->sender_name,$request->sender_type,$request->subject));
        return back();
    }
}
