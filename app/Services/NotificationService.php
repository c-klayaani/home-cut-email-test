<?php

namespace App\Services;

use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;

class NotificationService
{
    function send($title, $body, $recipients)
    {
        $message =
            new ExpoMessage([
                'title' => $title,
                'body' => $body
            ]);

        (new Expo)->send($message)->to($recipients)->push();
    }
}
