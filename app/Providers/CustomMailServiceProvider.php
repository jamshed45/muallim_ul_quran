<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class CustomMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $smtpSettings = Setting::where(function ($query) {
            $query->whereNull('user_id')
                  ->orWhere('user_id', '');
        })
        ->whereIn('key', [
            'mail_mailer',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name',
        ])
        ->get();
        $smtpArray = $smtpSettings->pluck('val', 'key')->toArray();

        if ($smtpArray) {
            // Set the SMTP configuration dynamically
            Config::set('mail.mailers.smtp.host', $smtpArray['mail_host']);
            Config::set('mail.mailers.smtp.port', $smtpArray['mail_port']);
            Config::set('mail.mailers.smtp.username', $smtpArray['mail_username']);
            Config::set('mail.mailers.smtp.password', $smtpArray['mail_password']);
            Config::set('mail.mailers.smtp.encryption', $smtpArray['mail_encryption']);
            Config::set('mail.from.address', $smtpArray['mail_from_address']);
            Config::set('mail.from.name', $smtpArray['mail_from_name']);
        }

    }
}
