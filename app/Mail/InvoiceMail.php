<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;





    public function __construct()
    {



        // 1: create instance



    } // end function








    // ---------------------------------------------------------------------









    public function envelope() : Envelope
    {
        return new Envelope(
            subject: 'Subscription Email',
        );
    }







    // ---------------------------------------------------------------------









    public function content() : Content
    {
        return new Content(
            view: 'view.name',
        );
    }








    // ---------------------------------------------------------------------





    public function attachments() : array
    {
        return [];
    }







    // ---------------------------------------------------------------------









    public function build()
    {

        return $this->view('livewire.mails.mails-subscription-invoice');

    } // end function










} // end class
