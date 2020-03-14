<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public $timestamps = true;

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'doctor_id');
    }
}
