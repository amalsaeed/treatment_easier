<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(User::class, 'user_id');
    }

    public function clinic()
    {
        return $this->hasOne(Clinic::class, 'id');
    }
}
