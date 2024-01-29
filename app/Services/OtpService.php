<?php

namespace App\Services;

use App\Models\RegistrationOTP;

class OtpService
{
    private $arNumbers = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

    function generate($clientId)
    {
        // Delete existing OTP by ClientId
        RegistrationOTP::where('ClientId', $clientId)->delete();

        return RegistrationOTP::create([
            'ClientId' => $clientId,
            'OTP' => rand(1000, 9999)
        ]);
    }

    function convertToEnglishNumber($arPhoneNumber)
    {
        return str_replace($this->arNumbers, range(0, 9), $arPhoneNumber);
    }
}
