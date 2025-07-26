<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as PaymentFacade;

class PaymentController extends Controller
{
    public function prePayment()
    {
        // Get course ID from session
        $courseId = session('product');

        if (!$courseId) {
            return redirect()->back()->with('error', 'محصولی برای خرید انتخاب نشده است');
        }

        // Get course details
        $course = Course::findOrFail($courseId);

        return view('public.payment.pre-payment', compact('course'));
    }

    public function setProductSession(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        // Store course ID in session
        session(['product' => $request->course_id]);

        return redirect()->route('payment.pre-payment');
    }

    public function processPayment(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'لطفا ابتدا وارد حساب کاربری خود شوید');
        }

        // Get course ID from session
        $courseId = session('product');

        if (!$courseId) {
            return redirect()->back()->with('error', 'محصولی برای خرید انتخاب نشده است');
        }

        // Get course details
        $course = Course::findOrFail($courseId);

        // Check if course is premium
        if ($course->type !== 'premium') {
            return redirect()->back()->with('error', 'این دوره رایگان است');
        }

        // Check if user already has this course
        if (auth()->user()->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->route('course.detail', $course->slug)->with('success', 'شما قبلا این دوره را خریداری کرده‌اید');
        }

        // Calculate amount
        $amount = $course->discount ? $course->discount : $course->price;

        // Validate amount
        if ($amount <= 0) {
            return redirect()->back()->with('error', 'مبلغ دوره نامعتبر است');
        }

        $invoice = (new Invoice)->amount($amount);

        return PaymentFacade::callbackUrl(route('payment.callback'))
            ->purchase($invoice, function($driver, $transactionId) use ($courseId) {
                Payment::create([
                    'user_id' => auth()->id(),
                    'course_id' => $courseId,
                    'result_number' => $transactionId,
                    'status' => '0'
                ]);
            })
            ->pay()
            ->render();
    }

    public function callback(Request $request)
    {
        try {
            $payment = Payment::where('result_number', $request['Authority'])->firstOrFail();
            $receipt = PaymentFacade::amount($payment->course->discount ? $payment->course->discount : $payment->course->price)
                ->transactionId($request['Authority'])
                ->verify();

            $payment->update([
                'status' => '1'
            ]);

            auth()->user()->courses()->attach($payment->course_id);
            session()->forget('product');

            return redirect()->route('course.detail', $payment->course->slug)
                ->with('success', 'پرداخت با موفقیت انجام شد و دوره به حساب شما اضافه شد');

        } catch (InvalidPaymentException $exception) {
            $payment = Payment::where('result_number', $request['Authority'])->first();
            if ($payment) {
                $payment->update([
                    'result_message' => $exception->getMessage()
                ]);
            }
            return redirect()->route('course.detail', $payment ? $payment->course->slug : 'home')
                ->with('error', $exception->getMessage());
        }
    }



    public function enrollFree(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'لطفا ابتدا وارد حساب کاربری خود شوید');
        }

        // Get course ID from session
        $courseId = session('product');

        if (!$courseId) {
            return redirect()->back()->with('error', 'محصولی برای خرید انتخاب نشده است');
        }

        // Get course details
        $course = Course::findOrFail($courseId);

        // Check if course is free
        if ($course->type === 'premium') {
            return redirect()->back()->with('error', 'این دوره رایگان نیست');
        }

        // Check if user already has this course
        if (auth()->user()->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->route('course.detail', $course->slug)->with('success', 'شما قبلا در این دوره ثبت نام کرده‌اید');
        }

        // Add course to user
        auth()->user()->courses()->attach($courseId);

        // Clear product session
        session()->forget('product');

        return redirect()->route('course.detail', $course->slug)->with('success', 'ثبت نام در دوره با موفقیت انجام شد');
    }
}
