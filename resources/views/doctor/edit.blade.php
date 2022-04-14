@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Doctor</h1>
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{ route('doctor.update', $doctor->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- <div class="form-group">
                        <label>Specialty</label>
                        <select name="specialty[]" class="form-control text-white">
                            <option value>Select Specialty</option>
                            @foreach ($specialties as $special)
                                <option value="{{ $special->specialty }}"
                                    {{ $special->specialty == $doctor->specialty ? 'selected' : '' }}>
                                    {{ $special->specialty }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="doctor_name">Doctor Name</label>
                        <input type="text" class="form-control text-white" id="doctor_name" name="doctor_name"
                            value="{{ $doctor->doctor_name }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="fees">Doctor Fees</label>
                        <input type="number" class="form-control text-white" id="fees" name="fees"
                            value="{{ $doctor->fees }}">
                    </div>
                    <div class="form-group">
                        <label>Old Photo</label>
                        <img src="{{ asset('uploads/doctor_photos/' . $doctor->doctor_photo) }}" width="200">
                    </div>
                    <div class="form-group">
                        <label>New Photo</label>
                        <input type="file" class="form-control" name="new_doctor_photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
