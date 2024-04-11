<?php

namespace common\helpers;

use DateTime;

class DateHelper
{
    public static function brDate($date)
    {
        $format = 'd/m/Y';
        if ($date) {
            return \DateTimeImmutable::createFromFormat('Y-m-d', $date)->format($format);
        }
    }
    public static function usDate($date)
    {       
        return DateTime::createFromFormat('d-m-Y', $date)->format('Y-m-d');

    }
}
