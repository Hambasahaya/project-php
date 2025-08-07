<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailService
{
    public static function send($to, $mailable): bool
    {
        try {
            Mail::to($to)->send($mailable);
            return true;
        } catch (\Exception $e) {
            Log::error('MailService Error: ' . $e->getMessage());
            return false;
        }
    }
}
