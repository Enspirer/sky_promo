<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromotionEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $greetings;
    public $name;
    public $subject;
    public function __construct($name,$greetings,$subject)
    {
        $this->greetings = $greetings;
        $this->name = $name;
        $this->subject = $subject;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('frontend.mail.promotion_email',[
                'greetings' => $this->greetings,
                'name' => $this->name,
                'subject' => $this->subject
            ]);
    }
}
