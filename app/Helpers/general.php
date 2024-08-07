<?php

use Carbon\Carbon;

if (!function_exists("formatCarbonDate")) {
    function formatCarbonDate(Carbon $carbonDate): array
    {
        return [
            "raw"            => $carbonDate,
            "diff_for_human" => $carbonDate->diffForHumans(),
            "date_string"    => $carbonDate->format(config("defaults.date_format")),
        ];
    }
}
