<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;

class Clicksight
{
    public function __construct(private readonly User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getRecentDashboards() : array
    {
        // Based on whatever the user opened
        // We'll do 10 fake ones for now
        return [
            [ 'id' => 1, 'name' => 'Finance Overview', 'initial' => 'F'],
            [ 'id' => 2, 'name' => 'Marketing Trends', 'initial' => 'M'],
            [ 'id' => 3, 'name' => 'Customer Insights', 'initial' => 'C'],
            [ 'id' => 4, 'name' => 'Sales Performance', 'initial' => 'S'],
            [ 'id' => 5, 'name' => 'Operational Metrics', 'initial' => 'O'],
            [ 'id' => 6, 'name' => 'Project Updates', 'initial' => 'P'],
            [ 'id' => 7, 'name' => 'Team Productivity', 'initial' => 'T'],
            [ 'id' => 8, 'name' => 'Resource Allocation', 'initial' => 'R'],
            [ 'id' => 9, 'name' => 'IT Operations', 'initial' => 'I'],
            [ 'id' => 10, 'name' => 'HR Statistics', 'initial' => 'H'],
        ];

    }

    public static function escape(string $data) : string
    {

        $connection = pg_connect(sprintf(
            "host=%s port=%s dbname=%s user=%s password=%s",
            config('database.connections.main.host'),
            config('database.connections.main.port'),
            config('database.connections.main.database'),
            config('database.connections.main.username'),
            config('database.connections.main.password')
        ));

        return pg_escape_bytea($connection, $data);
    }
}
