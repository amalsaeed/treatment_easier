<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    public $timestamps = true;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
