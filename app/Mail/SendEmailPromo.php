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
    use  Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $id;
    public function __construct($id)
    {
        $this->id = $id;
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
