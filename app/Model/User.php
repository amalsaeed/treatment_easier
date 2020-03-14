<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }
}
