<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordCustom extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->email], false));

        return (new MailMessage)
            ->subject('Reset Password Akun Anda')
            ->line('Kami menerima permintaan reset password untuk akun Anda.')
            ->action('Reset Password', $url)
            ->line('Abaikan email ini jika Anda tidak meminta reset password.');
    }
}
