@extends('layouts.app')

@section('title', 'Profil')

@component('components.alert')
<b>Tulisan ini akan mengisi variabel $slot</b>
@endcomponent

@section('sidebar')
@parent
<p>Sidebar halaman Profil.</p>
@endsection

@section('content')
 <p>Ini adalah bagian konten. 1941720116 - Girindra</p>
@endsection

