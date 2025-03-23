<?php

namespace App\Models;

use App\Services\Clicksight;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function(User $user){
            $user->avatar = Clicksight::escape(file_get_contents(resource_path('img/default-avatar.png')));
        });
    }

    /**
     * Get a user by their email address
     *
     * @param string $email
     * @return User|null
     */
    public static function getByEmail(string $email): ?User
    {
        return self::where('email', $email)->first();
    }

    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }

    public function workspacesJoined()
    {
        return $this->belongsToMany(Workspace::class, 'user_workspace', 'user_id', 'workspace_id')
                    ->wherePivot('relationship', 'member');
    }
}
