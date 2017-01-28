<?php

namespace App\Mail;

use App\Models\Inquiry;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InquiryMailForm extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.inquiry')
                    ->subject('Inquiry from www.sgehealthcare.com');
    }
}
