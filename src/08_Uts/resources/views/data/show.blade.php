@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem">
            <div class="card-header">
                Detail Data
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id: </b>{{$data->id}}</li>
                    <li class="list-group-item"><b>Title: </b>{{$data->title}}</li>
                    <li class="list-group-item"><b>Content: </b>{{$data->content}}</li>
                    <li class="list-group-item"><b>User_id: </b>{{$data->user_id}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{url('data')}}">Kembali</a>
        </div>
    </div>
</div>
@endsection