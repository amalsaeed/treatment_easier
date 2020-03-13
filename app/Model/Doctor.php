<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $table = 'doctors';
    public $timestamps = true;

    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'clinic_id');
    }
}
