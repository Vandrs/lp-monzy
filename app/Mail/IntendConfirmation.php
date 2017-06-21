<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class IntendConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $address;
    private $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($address, $name)
    {
        $this->address = $address;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->address, $this->name)
                    ->subject('Obrigado por manifestar seu interesse!')
                    ->view('email.intend-confirmation', ['name' => $this->name]);
    }

    public function handle()
    {
        Mail::send($this);
    }
}
