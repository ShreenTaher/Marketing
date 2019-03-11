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
            // $token = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hZG1pbmNwXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MjMyMjk1NiwiZXhwIjoxNTUyNDA5MzU2LCJuYmYiOjE1NTIzMjI5NTYsImp0aSI6Ik5HVTNzZ20weEhDMjNpeWUiLCJzdWIiOjEsInBydiI6ImNmMjg0YzJiMWUwNmYzM2MyNmJkNTc5NzU2NmQ5ZmQ3NGJlMTFiZjUiLCJpZCI6MSwibmFtZSI6InNocmVlbiIsImVtYWlsIjoic2hlaXJ5dGFoZXJAZ21haWwuY29tIn0.lkZe8zvxXRTsz0Xs9Nns932s-T5uTqSq8IRH_My0Xi0';
            // $sharingService->share('access_token', $token);
            // ☝️ you can set values here or in any place, since it's a public method
        
            return $sharingService;
        });
    }
}
