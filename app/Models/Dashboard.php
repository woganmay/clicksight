<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $fillable = [
        'name',
        'uuid',
        'workspace_id',
        'user_id'
    ];
}
