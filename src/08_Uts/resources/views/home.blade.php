@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <br><br>
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <font color="white">{{ __('You are logged in!') }}</font>
                    <table class="table table-responsive">

                        <tr>
                            <th>
                                <font color="white">Username
                            </th>
                            <th>
                                <font color="white">:
                            </th>
                            <td>
                                <font color="white">{{ Auth::user()->username }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <font color="white">Name
                            </th>
                            <th>
                                <font color="white">:
                            </th>
                            <td>
                                <font color="white">{{ Auth::user()->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <font color="white">Email
                            </th>
                            <th>
                                <font color="white">:
                            </th>
                            <td>
                                <font color="white">{{ Auth::user()->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <font color="white">Created At
                            </th>
                            <th>
                                <font color="white">:
                            </th>
                            <td>
                                <font color="white">{{ Auth::user()->created_at }}
                            </td>
                        </tr>

                    </table>
                    <a class="btn btn-success text-center" href="{{ route('profil.edit', Auth::user()->id) }}">Ubah Data</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection