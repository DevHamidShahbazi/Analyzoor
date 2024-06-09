<?php


namespace App\Notifications\Channels;


use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Illuminate\Notifications\Notification;

class SendSmsCreateUser
{
    public function send($notifiable, Notification $notification)
    {
        try
        {
            $template = "CreateUser";
            $phone = $notification->phone;
            $password = $notification->password;
            $receptor = $notification->phone;
            $type = 1; // 1: sms , 2: voice
            $api = new \Ghasedak\GhasedakApi(env('GHASEDAKAPI_KEY'));
            $api->Verify( $receptor, $type, $template, $phone,$password);

        }
        catch(ApiException $e){
            throw $e;
        }
        catch(HttpException $e){
            throw $e;
        }
    }
}
