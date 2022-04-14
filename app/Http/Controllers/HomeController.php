<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function redirect()
    {
        $doctors = Doctor::all();
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect('/');
        }
    }

    function index()
    {
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }
}
