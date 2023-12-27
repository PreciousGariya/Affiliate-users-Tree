<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jijunair\LaravelReferral\Traits\Referrable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Referrable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'referral_code', 'referrer_id',
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
        'password' => 'hashed',
    ];

    public function referredUsers()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }
    public function children()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
}
