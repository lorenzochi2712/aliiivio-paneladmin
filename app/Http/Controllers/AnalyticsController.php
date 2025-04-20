<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;

class AnalyticsController extends Controller
{
    public function index(AnalyticsService $service)
    {
        $visits = $service->getWebsiteVisits();
        return view('admin.analytics.visits', compact('visits'));
    }
}
