<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use SoftDeletes;

    protected $table = 'clinics';

    public $timestamps = true;

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'doctor_id');
    }
}
