<?php

namespace App\Http\Controllers;

use App\Model\Clinic;
use App\Model\Doctor;
use App\Model\Profile;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function index() {
        $user = User::where('id', auth()->user()->id)->first();

        $reservations = $user->reservations()->orderBy('state', 'desc')->get();

        return view('reservations.index')->with('reservations', $reservations);
    }

    public function create(Request $request) {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $doctors = Doctor::all();
        $clinics = Clinic::all();

        return view('reservations.create')
            ->with('profile', $profile)
            ->with('doctors', $doctors)
            ->with('clinics', $clinics);
    }

    public function store(Request $request) {
        $validator = \Validator::make($request->all(), [
            'clinic'    => 'required',
            'doctor'    => 'required',
            'date'      => 'required|after:today',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('id', auth()->user()->id)->first();

        $user->reservations()->create([
                'clinic_id'     => request('clinic'),
                'doctor_id'     => request('doctor'),
                'state'         => 'new',
                'notes'         => request('notes'),
                'date'          => Carbon::parse(request('date'))->format('Y-m-d'),
        ]);

        return redirect()->route('reservations')->with('success', 'Your appointment has been scheduled successfully');
    }

    public function edit($id) {
        $user = User::where('id', auth()->user()->id)->first();
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $doctors = Doctor::all();
        $clinics = Clinic::all();
        $reservation = $user->reservations()->where('id', $id)->first();

        return view('reservations.edit')
            ->with('profile', $profile)
            ->with('doctors', $doctors)
            ->with('clinics', $clinics)
            ->with('reservation', $reservation);
    }

    public function update($id, Request $request) {
        $validator = \Validator::make($request->all(), [
            'clinic'    => 'required',
            'doctor'    => 'required',
            'date'      => 'required|after:today',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('id', auth()->user()->id)->first();

        $reservation = $user->reservations()->where('id', $id)->first();

        $reservation->update([
            'clinic_id'     => request('clinic'),
            'doctor_id'     => request('doctor'),
            'state'         => 'new',
            'notes'         => request('notes'),
            'date'          => Carbon::parse(request('date'))->format('Y-m-d'),
        ]);

        return redirect()->route('reservations')->with('success', 'Your appointment has been updated successfully');
    }

    public function cancel($id) {
        $user = User::where('id', auth()->user()->id)->first();

        $reservation = $user->reservations()->where('id', $id)->first();

        $reservation->update([
            'state'         => 'canceled'
        ]);

        return redirect()->route('reservations')->with('success', 'Your appointment has been canceled successfully');
    }
}
