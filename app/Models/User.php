<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'username',
        'provider',
        'provider_id',
        'provider_token',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateUserName($username) {
        if ($username === null) {
            $username = Str::lower(Str::random(length: 8));
        }

        if (User::where('username', $username)->exists()) {
            $newUsername = username.Str::lower(Str::random(length: 3));
            $username = self::generateUserName($newUsername);
        }

        return $username;
    }

    public function roleInfo() {
        return $this->belongsTo('App\Models\Roles', 'role', 'role_id');
    }
}
