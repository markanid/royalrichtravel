<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $subject = match ($this->data['source']) {
            'service'   => 'Service Enquiry',
            'package'   => 'Package Enquiry',
            default     => 'Website Enquiry',
        };
        return $this->subject($subject)
                    ->view('emails.contact_form_submission');
    }
}
