<?php

namespace App\Services;

class AnalyticsService
{
    public function getWebsiteVisits()
    {
        return [
            'this_week' => 450,
            'this_month' => 2380,
            'this_year' => 30200
        ];
    }
}
