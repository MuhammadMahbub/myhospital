@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="mb-3">
            <a href="{{ route('specialty.view') }}" class="btn btn-light p-2">
                <h4>View All</h4>
            </a>
        </div>
        <div class="col-12 m-auto">
            <form method="POST" action="{{ route('specialty.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="specialty">Add Doctor Specialty</label>
                    <input type="text" class="form-control text-white" id="specialty" name="specialty"
                        value="{{ old('specialty') }}">
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
