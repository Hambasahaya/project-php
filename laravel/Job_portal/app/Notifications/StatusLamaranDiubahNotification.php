<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class StatusLamaranDiubahNotification extends Notification
{
    public $status, $lowongan;

    public function __construct($status, $lowongan)
    {
        $this->status = $status;
        $this->lowongan = $lowongan;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Status Lamaran Anda Diperbarui')
            ->greeting('Halo ' . $notifiable->name)
            ->line("Status lamaran Anda untuk posisi **{$this->lowongan->judul_lowongan}** telah diperbarui menjadi:")
            ->line("**{$this->status}**")
            ->action('Lihat Detail', url('/lamaran-saya'))
            ->line('Terima kasih telah melamar.');
    }
}
