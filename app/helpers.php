<?php

use Carbon\Carbon;

if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('d M Y');
    }
}
