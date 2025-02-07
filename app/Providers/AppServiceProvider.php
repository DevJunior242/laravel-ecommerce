<?php

namespace App\Providers;

use App\Models\Cart;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        
        
        // if (Auth::check()) {
        //     $user = auth()->user();
        //     $carts = Cart::where('email',$user->email)->count();
        //     View::share('carts', $carts);
        // }
      

        
        // $user = auth()->user();
        // View::share('user', $user);
        
        // if ($user) {
        //    $carts = Cart::where('email',$user->email)->count();
          
        // } else {
        //    $carts = 0;
        // }
        // View::share('carts', $carts);
    }
}
