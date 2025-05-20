<?php


namespace App\Helpers\Cart\facade;


use Illuminate\Support\Facades\Facade;

class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {

        return 'cart';
    }
}
