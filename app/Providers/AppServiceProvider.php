<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\services\SharingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('shared', function() {

            $sharingService = new SharingService();
        
            $sharingService->share('base_url', 'http://localhost:9000/api');
             $token = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MjQ2ODAxNiwiZXhwIjoxNTUyNTU0NDE2LCJuYmYiOjE1NTI0NjgwMTYsImp0aSI6IjV2UXpoRnZobUgwYm1YUHkiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.puA0f_ee6pjicDeHS5UH42GtoIZwv-6X-T4bfM7_GFY';
             $sharingService->share('token', $token);
            // ☝️ you can set values here or in any place, since it's a public method
        
            return $sharingService;
        });
    }
}
