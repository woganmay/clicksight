<?php

namespace App\Services;

use App\Models\User;
use PgSql\Connection;

class Clicksight
{
    public function __construct(private readonly User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
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
