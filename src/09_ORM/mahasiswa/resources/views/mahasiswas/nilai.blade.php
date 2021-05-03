@extends('mahasiswas.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2 text-center">
            <h2 class="mb-5">JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            <h1>KARTU HASIL STUDI (KHS)</h1>
        </div>
        <div class="container-fluid">
            <p> <b>Nama :</b> {{$data->Nama}}</p>
            <p> <b>Nim :</b> {{$data->Nim}}</p>
            <p> <b>Nim :</b> {{$data->kelas->nama_kelas}}</p>

        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
                @foreach ($data->matakuliah as $matakuliah)
                <tr>
                    <td>{{ $matakuliah->nama_matkul }}</td>
                    <td>{{ $matakuliah->sks }}</td>
                    <td>{{ $matakuliah->semester }}</td>
                    <td>{{ $matakuliah->pivot->nilai }}</td>
                </tr>
                @endforeach
            </table>
            <a href="{{ route('mahasiswas.index') }}" class="btn btn-success">Kembali</a>
        </div>

    </div>
</div>
@endsection