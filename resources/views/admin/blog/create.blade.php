@extends('admin.layouts.admin-layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Blog</h1>
            
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
        <form action="{{ route('blog.store') }}" method="POST">
            @csrf
            <div class="row">
                <label for="">Title</label>
                <input class="form-control" type="text" value="{{ old('title') }}" name="title">
                <label for="">Thumbnail</label>
                <input class="form-control" type="file"  name="thumbnail">

                <label for="">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ old('content') }}</textarea>
                <button class="btn btn-primary mt-3 d-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
