<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetTokenMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public $token) {}

    public function build()
    {
        return $this->subject('Kode Reset Password Anda')
            ->view('email.reset_token')
            ->with(['token' => $this->token]);
    }
}
