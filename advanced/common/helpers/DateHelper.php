<?php

namespace common\helpers;

class DateHelper
{
    public static function brDate($datetime)
    {
        $format = 'd/m/Y';
        if ($datetime) {
            return \DateTimeImmutable::createFromFormat('Y-m-d', $datetime)->format($format);
        }
    }
}
