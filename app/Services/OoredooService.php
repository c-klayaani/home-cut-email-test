<?php

namespace App\Services;

use eliechaaban\Ooredoo\Messenger;

class OoredooService
{
    protected $ooredoo;

    function __construct()
    {
        $this->ooreedo = new Messenger(env('OOREDOO_CUSTOMER_ID'), env('OOREDOO_NAME'), env('OOREDOO_PASSWORD'), env('OOREDOO_ORIGINATOR'));
    }

    function sendSMS($phoneNumber, $message)
    {
        $this->ooreedo->sendSMS($message, str_replace('+', '', $phoneNumber));
    }
}
