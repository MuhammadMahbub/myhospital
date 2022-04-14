@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">My Appointment</h1>
        <div class="row">
            <div class="col-12">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $myappoint->patient_name }}</td>
                            <td>{{ $myappoint->doctor_name }}</td>
                            <td>{{ $myappoint->date }}</td>
                            <td>{{ $myappoint->status }}</td>
                            <td>
                                <div class="row">
                                    <form action="{{ route('myappoint.destroy', $myappoint->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </form>
                                </div>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
