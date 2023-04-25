<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Model::unguard();




        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage())
            ->view('email.verify', ['url' => $url])
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });



        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = url(route('password.reset', ['token' => $token], false));
            $url = $url . '?email=' . request()->input('email');

            return (new MailMessage())
            ->view('email.reset', ['url' => $url])
                ->subject('Recover password');
        });




    }
}
