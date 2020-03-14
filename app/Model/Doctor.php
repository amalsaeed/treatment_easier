<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = true;

    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'clinic_id');
    }
}
