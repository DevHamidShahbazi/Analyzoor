<?php

namespace App\Helpers\Cart;

use Illuminate\Support\Str;
use App\Models\Course;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart') ?? collect([]);
    }

    /**
     * افزودن دوره به سبد خرید
     */
    public function put(array $value)
    {
        $this->cart->put($value['course_id'], [
            'id' => Str::random(5),
            'course_id' => $value['course_id'],
            'type' => 'course'
        ]);

        session()->put('cart', $this->cart);
        return $this;
    }

    /**
     * بررسی وجود دوره در سبد خرید
     */
    public function has($courseId)
    {
        return $this->cart->has($courseId);
    }

    /**
     * دریافت یک آیتم از سبد خرید
     */
    public function get($courseId, $withRelation = true)
    {
        $item = $this->cart->get($courseId);

        return $withRelation ? $this->relationWithCourse($item) : $item;
    }

    /**
     * دریافت تمام محتویات سبد خرید
     */
    public function all()
    {
        return $this->cart->map(function ($item) {
            return $this->relationWithCourse($item);
        });
    }

    /**
     * افزایش تعداد دوره در سبد خرید
     */
    public function increment($courseId)
    {
        if ($this->cart->has($courseId)) {
            $item = $this->cart->get($courseId);

            $this->cart->put($courseId, $item);
            session()->put('cart', $this->cart);

            return $this;
        }

        return false;
    }

    /**
     * حذف یک دوره از سبد خرید
     */
    public function remove($courseId)
    {
        if ($this->cart->has($courseId)) {
            $this->cart->forget($courseId);
            session()->put('cart', $this->cart);

            return $this;
        }

        return false;
    }

    /**
     * خالی کردن سبد خرید
     */
    public function flush()
    {
        session()->forget('cart');
        $this->cart = collect([]);
    }

    /**
     * ارتباط دادن دوره با مدل Course
     */
    private function relationWithCourse($item)
    {
        if (isset($item['course_id'])) {
            $item['course'] = Course::find($item['course_id']);
            return $item;
        }

        return false;
    }
}
