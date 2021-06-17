<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;


class SendEmailPromo extends Mailable
{
    use Dispatchable,InteractsWithQueue, Queueable, SerializesModels;
    protected $send_mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($send_mail)
    {
        $this->send_mail = $send_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test Mail using Queue in Larvel 8')
            ->view('frontend.mail.sky_promo_email');
    }
}
