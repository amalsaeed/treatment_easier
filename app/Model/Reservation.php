<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Reservation extends Model
{
    protected $table = 'reservations';
    public $timestamps = true;

    protected $fillable = ['clinic_id','doctor_id','state', 'notes', 'date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'doctor_id');
    }

    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'id');
    }

    public function scopeNew(Builder $query)
    {
        return $query->where('state', 'new');
    }

    public function scopeCanceled(Builder $query)
    {
        return $query->where('state', 'canceled');
    }
}
