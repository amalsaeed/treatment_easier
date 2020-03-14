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
        return view('admin.doctors')->with('doctors', $doctors);
    }

    public function clinics() {
        $clinics = Clinic::all();
        return view('admin.clinics')->with('clinics', $clinics);
    }

    public function createDoctor() {

    }

    public function storeDoctor(Request $request) {

    }

    public function storeClinic(Request $request) {

    }
}
