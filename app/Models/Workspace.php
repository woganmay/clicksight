<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    // Every workspace has an owner, who can invite additional users to the workspace.
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class);
    }

}
