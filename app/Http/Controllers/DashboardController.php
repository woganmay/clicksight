<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function edit(Dashboard $dashboard)
    {
        // TODO: Ensure security, access rights etc
        return inertia('Dashboard', [
            'dashboard' => $dashboard
        ]);
    }
}
