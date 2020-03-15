<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = true;

    protected $fillable = ['name', 'mobile', 'id_number', 'clinic_id'];

    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'clinic_id');
    }
}
