<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IntendConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $to;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($to, $name)
    {
        $this->to = $to;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->to, $this->name)
                    ->view('email.intend-confirmation');
    }
}
