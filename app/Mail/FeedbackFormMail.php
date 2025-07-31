<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FeedbackFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $formData;
    //  public $message;

    public function __construct($formData)
    {
        dd($formData);
        $this->formData = $formData;
        
    }

    /**
     * Get the message envelope.
     */
    
    
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        // dd($formData);
        return $this->view('emails.feedback_form')->subject('please provide your feedback...')->with('formData', $this->formData);
    }
}
