<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    function appointment(Request $request)
    {
        if (Auth::id()) {
            Appointment::insert([
                'user_id' => Auth::user()->id,
                'patient_name' => $request->patient_name,
                'email' => $request->email,
                'doctor_name' => $request->doctor_name,
                'date' => $request->date,
                'phone' => $request->phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
        } else {
            return redirect('/login');
        }

        return redirect('/');
    }

    function my_appointment($id)
    {
        $esist = Appointment::where('user_id', Auth::id());
        if ($esist->exists()) {
            return view('user.myappointment', [
                'myappoint' => Appointment::where('user_id', $id)->first()
            ]);
        } else {
            return back();
        }
    }

    function myappoint_destroy($id)
    {
        Appointment::find($id)->delete();
        return redirect('/');
    }

    function all_appointment()
    {
        return view('admin.allappoints', [
            'allappoints' => Appointment::all()
        ]);
    }

    function getdoctor(Request $request)
    {
        $jsp = $request->post('jsp');
        $doc = Doctor::where('specialty', $jsp)->get();
        $html = '<option value>General Doctor</option>';
        foreach ($doc as $doctor) {
            $html .= '<option value="' . $doctor->doctor_name . '">' . $doctor->doctor_name . ' => ' . $doctor->fees . '(fees)' . '</option>';
        }
        echo $html;
    }

    function appoint_status($id)
    {
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return back();
    }
}
