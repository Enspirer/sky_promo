<?php

namespace App\Jobs;

use App\Mail\SendEmailPromo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailDemo;
use Mail;
use DB;

class SendPromoMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $send_mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($send_mail)
    {
        $this->send_mail = $send_mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach(range(1,100000) as $index) {
            $randomString = self::generateRandomString(10);
            DB::table('email_builks')->insert([
                'email' => $randomString.'@yopmail.com',
                'description' => '',
                'category' => 'sdfsdfds'
            ]);
        }
//        $email = new SendEmailPromo();
//        Mail::to($this->send_mail)->send($email);
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
