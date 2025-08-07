<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LamaranDikirimNotification extends Notification
{
    public $lowongan;

    public function __construct($lowongan)
    {
        $this->lowongan = $lowongan;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Lamaran Anda Telah Dikirim')
            ->greeting('Halo ' . $notifiable->name)
            ->line("Lamaran Anda untuk posisi **{$this->lowongan->judul_lowongan}** telah berhasil dikirim.")
            ->line("Kami akan menghubungi Anda kembali jika lamaran Anda lolos seleksi.")
            ->line('Terima kasih telah melamar melalui platform kami.');
    }
}
