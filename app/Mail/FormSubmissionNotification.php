<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormSubmissionNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $formUrl;
    public function __construct($formUrl)
    {
        // dd($formUrl);
        $this->formUrl = $formUrl;
    }

    

    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        return $this->view('emails.form_submission')
                    ->subject('New Form Submission');
    }
}
