<?php

namespace common\helpers;

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
        $format = 'yyyy-MM-dd';
        if ($date) {
            return \DateTimeImmutable::createFromFormat('Y-m-d', $date)->format($format);
        }
    }
}
