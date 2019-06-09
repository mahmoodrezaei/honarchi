<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name',
        'national_code', 'credit_card', 'phone',
        'avatar_path', 'is_subscribed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_subscribed' => 'boolean'
    ];

    public function getAvatarPathAttribute($avatar)
    {
        return ($avatar == null) ? asset('assets/images/default_avatar.svg') : '/storage/' . $avatar;
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'owner_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
