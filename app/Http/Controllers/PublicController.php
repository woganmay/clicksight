<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * @param string $uuid The UUID of the dashboard to render out
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function view(string $uuid)
    {
        dd($uuid);

        // Check permissions, log the visit etc

        return inertia('Public/Dashboard', []);
    }
}
