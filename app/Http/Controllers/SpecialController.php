<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Special;
use Carbon\Carbon;

class SpecialController extends Controller
{

    public function specialty()
    {
        return view('admin.specialty');
    }

    function specialty_store(Request $request)
    {
        Special::insert([
            'specialty' => $request->specialty,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    function specialty_view()
    {
        return view('admin.allspecials', [
            'specials' => Special::all()
        ]);
    }

    function specialty_destroy($id)
    {
        Special::find($id)->delete();
        return back();
    }
}
