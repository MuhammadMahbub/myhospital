<?php

use App\Http\Controllers\{HomeController, DoctorController, AppointmentController, SpecialController};
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::post('/getdoctor', [AppointmentController::class, 'getdoctor']);
Route::post('/appointment', [AppointmentController::class, 'appointment'])->name('appointment');
Route::get('/all/appointment', [AppointmentController::class, 'all_appointment'])->name('all.appointment');
Route::get('/my/appointment/{id}', [AppointmentController::class, 'my_appointment'])->name('my.appointment');
Route::get('/appoint/status{id}', [AppointmentController::class, 'appoint_status'])->name('appoint.status');
Route::delete('myappoint/destroy/{id}', [SpecialController::class, 'myappoint_destroy'])->name('myappoint.destroy');

Route::resource('doctor', DoctorController::class);
Route::get('specialty', [SpecialController::class, 'specialty'])->name('specialty');
Route::post('specialty/store', [SpecialController::class, 'specialty_store'])->name('specialty.store');
Route::delete('specialty/destroy/{id}', [SpecialController::class, 'specialty_destroy'])->name('specialty.destroy');
Route::get('specialty/view', [SpecialController::class, 'specialty_view'])->name('specialty.view');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
