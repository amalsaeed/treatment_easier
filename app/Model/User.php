<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }
}
