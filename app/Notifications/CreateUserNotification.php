<?php

namespace App\Notifications;

use App\Notifications\Channels\SendSmsCreateUser;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreateUserNotification extends Notification
{
    use Queueable;

    public $phone;
    public $password;

    public function __construct($phone,$password)
    {
        $this->phone = $phone;
        $this->password = $password;
    }


    public function via($notifiable)
    {
        return [SendSmsCreateUser::class];
    }
}
