@extends('layouts.app')


@section('content')
    <h1 class="text-center text-info">Edit File{{$file->title}}</h1>
      <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('file.update') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label>File Title</label>
                        <input type="text" value="{{$file->title}}" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>File Description</label>
                        <input type="text" value="{{$file->title}}" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Upload Your File :{{$file->file}}</label>
                        <input type="file" " class="btn btn-info form-control" name="fileInput">
                    </div>
                    <button class="btn btn-primary">Upload File</button>
                </form>
            </div>
        </div>
    </div>
@endsection
