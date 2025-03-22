<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return inertia('Dashboard');
    }

    public function renderMyAvatar()
    {
        /* pg set binary content */
        /*$pgConnection = pg_connect(
            sprintf(
                "host=%s dbname=%s user=%s password=%s",
                config('database.connections.main.host'),
                config('database.connections.main.database'),
                config('database.connections.main.username'),
                config('database.connections.main.password')
            )
        );

        if (!$pgConnection) {
            abort(500, 'Failed to connect to database');
        }

        $scopeDocument->content = pg_escape_bytea(
            $pgConnection,
            file_get_contents($documentPath)
        );*/

        dd(request()->user()->avatar);
    }
}
