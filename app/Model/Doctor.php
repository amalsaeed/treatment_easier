<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $table = 'doctors';
    public $timestamps = true;

    protected $fillable = ['name', 'mobile', 'id_number', 'clinic_id', 'password', 'email'];

    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'clinic_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'doctor_id');
    }
}
