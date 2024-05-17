<?php

namespace App\Notifications\public;

use App\Notifications\Channels\SendSmsActiveCode;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ActiveCodeNotification extends Notification
{
    use Queueable;
    public $code;
    public $phone;

    public function __construct($code,$phone)
    {
        $this->code = $code;
        $this->phone = $phone;
    }


    public function via($notifiable)
    {
        return [SendSmsActiveCode::class];
    }
}
