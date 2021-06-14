@extends('layouts.app2')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Metro City</h2>
            <p>Cari data:</p>
            <nav class="navbar navbar-light bg-light p-2">
                <form action="/search" method="GET" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Cari .." value="{{ old('cari') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
                    <a class="btn btn-success ml-3" href="{{ route('contents.create') }}"> Input Mahasiswa</a>
                </form>
            </nav>
        </div>

        <div class="float-right my-2">

        </div>

    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($contents as $Content)
    <tr>

        <td>{{ $Content->title }}</td>
        <td>{{ $Content->content }}</td>
        <td><img width="100px" src="{{ asset('storage/' . $Content->image) }}"></td>
        <td>
            <form action="{{ route('contents.destroy',$Content->title) }}" method="POST">

                <a class="btn btn-info" href="{{ route('contents.show',$Content->title) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('contents.edit',$Content->title) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<!-- {{ $Content->links()}} -->
@endsection