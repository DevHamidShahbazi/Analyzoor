<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

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
} 