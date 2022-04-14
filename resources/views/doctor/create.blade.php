@extends('layouts.app')


@section('content')
    <div class="mb-3">
        <a href="{{ route('doctor.index') }}" class="btn btn-dark">Doctors</a>
    </div>
    <div class="row">
        <div class="col-12 m-auto">
            <form method="POST" action="{{ route('doctor.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Specialty</label>
                    <select name="specialty" class="form-control text-white">
                        <option value>Select Specialty</option>
                        @foreach ($specialties as $special)
                            <option value="{{ $special->specialty }}">{{ $special->specialty }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="doctor_name">Doctor Name</label>
                    <input type="text" class="form-control text-white" id="doctor_name" name="doctor_name"
                        value="{{ old('doctor_name') }}">
                </div>
                <div class="form-group">
                    <label for="fees">Fees</label>
                    <input type="number" class="form-control text-white" id="fees" name="fees" value="{{ old('fees') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control text-white" id="phone" name="phone"
                        value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="room">Room</label>
                    <input type="text" class="form-control text-white" id="room" name="room" value="{{ old('room') }}">
                </div>
                <div class="form-group">
                    <label>Doctor photo</label>
                    <input type="file" class="form-control text-white" name="doctor_photo"
                        value="{{ old('doctor_photo') }}">
                </div>
                <button type="submit" class="btn btn-primary">Add Doctor</button>
            </form>
        </div>
    </div>
@endsection
