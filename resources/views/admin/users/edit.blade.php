@extends('admin.layouts.admin-layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Phone Number</h1>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Content Row -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="">Phone</label>
                <input class="form-control" type="text" value="{{ old('phone', $user->contact->phone) }}" name="phone">


                <button class="btn btn-primary mt-3 d-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
