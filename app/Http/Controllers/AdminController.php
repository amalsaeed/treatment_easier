<?php

namespace App\Http\Controllers;

use App\Model\Clinic;
use App\Model\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function doctors() {
        $doctors = Doctor::all();
        $clinics = Clinic::all();

        return view('admin.doctors')
            ->with('clinics', $clinics)
            ->with('doctors', $doctors);
    }

    public function clinics() {
        $clinics = Clinic::all();
        return view('admin.clinics')->with('clinics', $clinics);
    }

    public function storeDoctor(Request $request) {
        $validator = \Validator::make($request->all(), [
            'name'          => 'required',
            'mobile'        => 'required',
            'clinic'        => 'required',
            'id_number'        => 'required|digits:10'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Doctor::updateOrCreate(
            ['id_number'    => request('id_number')],
            [
                'name'          => request('name'),
                'mobile'        => request('mobile'),
                'clinic_id'     => request('clinic'),
            ]
        );

        return redirect()->back()->with('success', 'Doctor has been updated successfully');
    }


    public function storeClinic(Request $request) {
        $validator = \Validator::make($request->all(), [
            'name'          => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Clinic::create(['name' => request('name')]);

        return redirect()->back()->with('success', 'Clinic has been added successfully');
    }
}
