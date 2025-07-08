@extends('layouts.layout user-panel.index')
@section('payments','bg-primary text-white')
@section('page')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">لیست پرداخت‌های من</h4>
            </div>

            <div class="card-body">
                @if($payments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr style="background-color: #343a40;">
                                    <th class="text-center text-light" scope="col">ردیف</th>
                                    <th class="text-center text-light" scope="col">نام دوره</th>
{{--                                    <th class="text-center text-light" scope="col">شماره تراکنش</th>--}}
                                    <th class="text-center text-light" scope="col">تاریخ تراکنش</th>
                                    <th class="text-center text-light" scope="col">وضعیت پرداخت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key => $payment)
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                                        <td class="text-center font-weight-bold">
                                            {{ $payment->course->name ?? 'نامشخص' }}
                                        </td>
                                        {{--<td class="text-center font-weight-bold">
                                            {{ $payment->result_number ?? 'نامشخص' }}
                                        </td>--}}
                                        <td class="text-center font-weight-bold">
                                            {{ $payment->created_date . ' - ' . $payment->created_hour }}
                                        </td>
                                        <td class="text-center">
                                            @if($payment->status)
                                                <span class="badge bg-success">
                                                    پرداخت شده
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    عدم پرداخت
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-credit-card fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">هیچ پرداختی یافت نشد</h5>
                        <p class="text-muted">شما هنوز هیچ پرداختی انجام نداده‌اید.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
