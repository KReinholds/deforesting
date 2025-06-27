<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\Offer;
use App\Policies\OfferPolicy;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        Offer::class => OfferPolicy::class,
    ];
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
        view()->composer('*', function () {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->is_subscribed && $user->subscription_expires_at && now()->greaterThan($user->subscription_expires_at)) {
                    $user->update(['is_subscribed' => false]);
                }
            }
        });
    }
}
