@extends('layouts.app')

@section('content')
<style>
    .font-size-25 {
        font-size: 25px;
    }
</style>

<h1 class="text-center text-info">List File</h1>

@if (Session::has('done'))
<div class="alert alert-success">
    {{ Session::get('done') }}
</div>
@endif

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>File Title</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td><a href="{{ route('file.show', $item->id) }}" class="text-primary"><i class="fa-regular fa-eye"></i></a></td>
                        <td><a href="{{ route('file.edit', $item->id) }}" class="text-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td>
                            <form action="{{ route('file.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
