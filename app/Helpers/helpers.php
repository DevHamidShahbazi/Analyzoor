<?php

use App\Models\Comment;
use App\Models\Setting;
use App\Models\User;

if (!function_exists('to_english_numbers')) {

    function convert_number_persian_to_english($string){
        $persianDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $persianDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $allPersianDigits = array_merge($persianDigits1, $persianDigits2);
        $replaces = [...range(0, 9), ...range(0, 9)];
        return str_replace($allPersianDigits, $replaces , $string);
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

if (!function_exists('notify_comment_new')) {
    function notify_comment_new()
    {
        return count(Comment::where('is_active','0')->whereDate('created_at','>',Carbon\Carbon::now()->subDays(2))->latest()->get());
    }
}

if (!function_exists('convert_name_to_slug')) {
    function convert_name_to_slug($name)
    {
        return str_replace(" ", "-", $name);
    }
}
