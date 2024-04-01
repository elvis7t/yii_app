<?php

namespace app\helpers;

class DateHelper
{
    public static function brDate($date)
    {
        $format = 'd/m/Y';
        if ($date) {
            return \DateTimeImmutable::createFromFormat('Y-m-d', $date)->format($format);
        }
    }
}
