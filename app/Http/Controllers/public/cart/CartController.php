<?php

namespace App\Http\Controllers\public\cart;

use App\Helpers\Cart\facade\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart_remove($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
