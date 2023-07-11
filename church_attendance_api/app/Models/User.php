<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

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
    public function first_timer(){

        return $this->hasOne(First_timer::class);
    }
    public function member(){

        return $this->hasOne(Member::class);
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $userDetails = [
                'ip' => request()->getClientIp(),
                'hash' => Str::uuid(),
                'password' => Hash::make(request('password')),
                'is_admin' =>0,
            ];

            $user->fill($userDetails);
        });
    }

    
}
