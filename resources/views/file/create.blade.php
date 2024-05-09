@extends('layouts.app')

@section('content')
    <h1 class="text-center text-info">Create File</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('done')) <!-- Fixed syntax error here -->
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif

    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>File Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>File Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Upload Your File</label>
                        <input type="file" class="btn btn-info form-control" name="fileInput">
                    </div>
                    <button class="btn btn-primary" type="submit">Upload File</button> <!-- Added type="submit" -->
                </form>
            </div>
        </div>
    </div>
@endsection
