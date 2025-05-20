<?php


namespace App\Helpers\Cart\provider;


use App\Helpers\Cart\CartService;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('cart',function (){
            return new CartService();
        });
    }
}
