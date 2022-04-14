@extends('layouts.app')

@section('content')
    @auth
        @if (Auth::user()->role == 1)
            <div class="mb-3">
                <a href="{{ route('doctor.create') }}" class="btn btn-light">Add Doctors</a>
            </div>
        @endif
    @endauth

    <div class="container-fluid px-4">
        <h1 class="mt-4">Doctors</h1>
        <div class="row">
            <div class="col-12">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Doctor Specialty</th>
                            <th scope="col">Doctor Fees</th>
                            <th scope="col">Doctor Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $key=>$doctor)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $doctor->doctor_name }}</td>
                                <td>{{ $doctor->specialty }}</td>
                                <td>{{ $doctor->fees }}</td>
                                <td>
                                    <img style="width: 100px; height: 100px"
                                        src="{{ asset('uploads/doctor_photos/' . $doctor->doctor_photo) }}" alt="">
                                </td>
                                <td>
                                    @auth
                                        @if (Auth::user()->role == 1)
                                            <div class="row">
                                                <div class="col-3"><a class="btn btn-outline-info"
                                                        href="{{ route('doctor.edit', $doctor->id) }}">Edit</a></div>
                                                <div class="col-3">
                                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endauth

                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-dark">No Record</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
