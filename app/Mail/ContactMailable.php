<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $contact_data;
    public  $items_in_cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_data,$items_in_cart)
    {
        $this->contact_data = $contact_data;
        $this->items_in_cart = $items_in_cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');

        $from_name = "Ekart";
        $from_email = "yogesh.bizita@gmail.com";
        $subject = "Ekart: Thank you for purchasing";
        return $this->from($from_email, $from_name)
            ->view('emails.contact')
            ->subject($subject)
        ;
    }
}
