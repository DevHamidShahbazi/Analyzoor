<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = QueryBuilder::for(Payment::class)
            ->allowedFilters([
                AllowedFilter::exact('advert_id'),
            ])->get();
        return view('admin.payment.index',compact('payments'));
    }
}
