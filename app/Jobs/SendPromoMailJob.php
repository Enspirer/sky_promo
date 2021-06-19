<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Models\EmailBuilk;
use App\Mail\SendEmailPromo;
use DB;
use Matrix\Exception;

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


//        Mail::to($this->send_mail)->send($email);

        EmailBuilk::chunk(100, function ($emailbulk) {
            foreach ($emailbulk as $emailbulks)
            {
                    try{
                        sleep(1);
                        $email = new SendEmailPromo(1);
                        Mail::to($emailbulks->email)->send($email);
                        DB::table('campaign_statics')->where('campaign_id',1)->update([
                            'email_send_count' => DB::raw('email_send_count+1')
                        ]);
                    }catch (Exception $exception)
                    {
                        sleep(1800);
                        continue;

                    }
            }
        });

//        foreach(range(1,100000) as $index) {
//            $randomString = self::generateRandomString(10);
//            DB::table('email_builks')->insert([
//                'email' => $randomString.'@yopmail.com',
//                'description' => '',
//                'category' => 'sdfsdfds'
//            ]);
//        }
//        $email = new SendEmailPromo();
//
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
