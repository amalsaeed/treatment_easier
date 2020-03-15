<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard() {
        $doctor = Doctor::with('reservations')->findOrFail(auth()->user()->id);

        $newReservations = $doctor->reservations()->new()->get();
        $canceledReservations = $doctor->reservations()->canceled()->get();

        return view('doctor.dashboard')
            ->with('newReservations', $newReservations)
            ->with('canceledReservations', $canceledReservations);
    }
}
