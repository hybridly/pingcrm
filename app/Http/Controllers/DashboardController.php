<?php

namespace App\Http\Controllers;

use Hybridly\Contracts\HybridResponse;

class DashboardController extends Controller
{
    public function index(): HybridResponse
    {
        return hybridly("dashboard.index");
    }
}
