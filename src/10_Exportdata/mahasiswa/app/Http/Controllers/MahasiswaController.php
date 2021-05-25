<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;
use PDF;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        //$mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
        $mahasiswas = Mahasiswa::where([
            ['Nama', '!=', Null],
            [function ($query) use ($request){
                if(($term = $request->term)){
                    $query->orWhere('Nama', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('Nim', 'desc')
            ->with('kelas')
            ->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'image' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);
        $mahasiswa =  new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }
        $mahasiswa->photo = $image_name;
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');
        $mahasiswa->email = $request->get('E-mail');
        $mahasiswa->Tgl_lahir = $request->get('Tgl_lahir');
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        //fungsi eloquent untuk menambah data
        //Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //$Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        return view('mahasiswas.detail', ['Mahasiswa'=>$mahasiswa]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        //$Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);
        $mahasiswa =  Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->nama = $request->get('Nama');
            if($mahasiswa->photo && file_exists('app/public/' . $mahasiswa->photo)) {
                \Storage::delete('public/' . $mahasiswa->photo);
            }
            $image_name = $request->file('image')->store('images', 'public');
            $mahasiswa->photo = $image_name;
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        //fungsi eloquent untuk mengupdate data inputan kita
        //Mahasiswa::find($Nim)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
    public function nilai($Nim)
    {
        //menampilkan detail data nilai mahasiswa dengan menemukan/berdasarkan Nim Mahasiswa
        $mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->find($Nim);
        return view('mahasiswas.nilai', compact('mahasiswa'));
    }
    public function cetak_khs($nim){
        $Mahasiswa = Mahasiswa::findOrFail($nim);
        // Fungsi untuk mencetak ke pdf dengan mnggunakan DomPDF
        $pdf= PDF::loadview('mahasiswas.cetak_khs', ['mahasiswa' => $Mahasiswa]);
        return $pdf->stream();
    }
}