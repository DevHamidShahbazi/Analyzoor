<?php
if (!function_exists('to_english_numbers')) {

    function convert_number_persian_to_english($string){
        $persianDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $persianDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $allPersianDigits = array_merge($persianDigits1, $persianDigits2);
        $replaces = [...range(0, 9), ...range(0, 9)];
        return str_replace($allPersianDigits, $replaces , $string);
    }
}
