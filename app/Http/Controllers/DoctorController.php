<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.index', [
            'doctors' => Doctor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create', [
            'specialties' => Special::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('doctor_photo')) {
            $file = $request->file('doctor_photo');
            $ext = $file->getClientOriginalExtension();
            $new_name = Auth::id() . '-' . uniqid() . '.' . $ext;
            $file->move('uploads/doctor_photos/', $new_name);
        }
        Doctor::insert([
            'doctor_photo' => $new_name,
            'doctor_name' => $request->doctor_name,
            'room' => $request->room,
            'phone' => $request->phone,
            'specialty' => $request->specialty,
            'fees' => $request->fees,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialties = Special::all();
        $doctor = Doctor::find($id);
        return view('doctor.edit', compact('doctor', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        if ($request->hasFile('new_doctor_photo')) {
            unlink(base_path('public/uploads/doctor_photos/' . $doctor->doctor_photo));
            $ext = $request->file('new_doctor_photo')->getClientOriginalExtension();
            $new_name = $doctor->id . '-' . uniqid() . '.' . $ext;
            $request->file('new_doctor_photo')->move('uploads/doctor_photos/', $new_name);

            $doctor->update([
                'doctor_photo' => $new_name,
            ]);
        }

        $doctor->update([
            'fees' => $request->fees,
        ]);
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        unlink(base_path('public/uploads/doctor_photos/' . $doctor->doctor_photo));
        $doctor->delete();
        return back();
    }
}
