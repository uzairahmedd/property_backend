<?php

namespace Amcoders\Plugin\sendmail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'])->subject('['.env('APP_NAME').'] Message sent via your '.env('APP_NAME').' profile from '.$this->data['name'].'')->markdown('plugin::emails.property.sendmail')->with('data',$this->data);
    }
}
