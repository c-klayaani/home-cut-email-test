<?php

namespace App\Services;

class NumeralService
{
    private $arNumbers = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

    function convertEnToAr($enNumber)
    {
        return str_replace(range(0, 9), $this->arNumbers, $enNumber);
    }
}
