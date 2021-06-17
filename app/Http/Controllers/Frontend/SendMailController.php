<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendEmailPromo;

class SendMailController extends Controller
{
    public function index()
    {
        $send_mail = 'testlaravel@yopmail.com';
        new SendEmailPromo($send_mail);
        dd('send mail successfully !!');
    }
}
