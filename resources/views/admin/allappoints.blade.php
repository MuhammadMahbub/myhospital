@extends('layouts.app')

@section('content')
    <div class="container px-4">
        <h1 class="mt-4">Doctors</h1>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            {{-- <th scope="col">Message</th> --}}
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allappoints as $key=>$appoint)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ App\Models\User::find($appoint->user_id)->name }}</td>
                                <td>{{ $appoint->patient_name }}</td>
                                <td>{{ $appoint->email }}</td>
                                <td>{{ $appoint->phone }}</td>
                                {{-- <td>{{ $appoint->message }}</td> --}}
                                <td>{{ $appoint->date }}</td>
                                <td>{{ $appoint->status }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6"><a href="{{ route('appoint.status', $appoint->id) }}"
                                                class="btn btn-outline-info">Approve</a></div>
                                        <div class="col-6">
                                            <form action="#" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">Cancel</button>
                                            </form>
                                        </div>
                                    </div>

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
