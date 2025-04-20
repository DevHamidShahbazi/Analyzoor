<?php

use App\Models\Comment;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Carbon\CarbonInterval;

if (!function_exists('to_english_numbers')) {

    function convert_number_persian_to_english($string){
        $persianDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $persianDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $allPersianDigits = array_merge($persianDigits1, $persianDigits2);
        $replaces = [...range(0, 9), ...range(0, 9)];
        return str_replace($allPersianDigits, $replaces , $string);
    }
}

if (!function_exists('time_course')) {
    function time_course($times)
    {
        $totalSeconds = 0;

        foreach ($times as $time) {
            list($hours, $minutes, $seconds) = explode(':', $time);
            $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
        }

        $totalTime = CarbonInterval::seconds($totalSeconds)->cascade();

        $formattedTime = sprintf('%02d:%02d:%02d', $totalTime->hours, $totalTime->minutes, $totalTime->seconds);

        echo $formattedTime;
    }
}

if (!function_exists('percent')) {
    function percent($price,$discount)
    {
        $disc = 100*$discount;
        $x =  $disc / $price;
        $dar100_discount=100-$x;
        $explode=explode('.',$dar100_discount);
        return $explode[0];
    }
}


if (!function_exists('notify_user_new')) {
    function notify_user_new()
    {
        return count(User::whereDate('created_at','>',Carbon\Carbon::now()->subDays(3))->latest()->get());
    }
}

if (!function_exists('setting_with_key')) {
    function setting_with_key($key)
    {
        return Setting::where('key',$key)->first();
    }
}

if (!function_exists('notify_payment_new')) {
    function notify_payment_new()
    {

        return count(Payment::where('status','1')->whereDate('created_at','>',Carbon\Carbon::now()->subDays(2))->get());
    }
}

if (!function_exists('notify_comment_new')) {
    function notify_comment_new()
    {
        return count(Comment::where('is_active','0')->whereDate('created_at','>',Carbon\Carbon::now()->subDays(2))->latest()->get());
    }
}

if (!function_exists('notify_message_new')) {
    function notify_message_new()
    {
        return count(\App\Models\Message::whereDate('created_at','>',Carbon\Carbon::now()->subDays(2))->latest()->get());
    }
}

if (!function_exists('convert_name_to_slug')) {
    function convert_name_to_slug($name)
    {
        return str_replace(" ", "-", $name);
    }
}
