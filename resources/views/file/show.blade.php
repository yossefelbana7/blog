@extends('layouts.app')


@section('content')
    <h1 class="text-center text-info">Show File{{$file->title}}</h1>
      <div class="container col-6">
        <div class="card">
        filetitle : {{$file->title}}
            <div class="card-body">
            File Description : {{$file->description}}
            File Name : {{$file->file}}
            </div>
            <a href="{{route('file.download' , $file->id)}}" class="btn btn-successful"><i class="fa-solid fa-download"></i> Download</a>
        </div>
    </div>
@endsection
