<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index() {
        
        $siswa_list = Siswa::orderBy('nama_siswa' , 'asc') -> paginate(5);  
        //sortir by descending
        //$siswa_list = Siswa::all()->sortByDesc('tanggal_lahir');
        //menampilkan jumlah siswa
        $jumlah_siswa = Siswa::count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    //halaman create
    public function create() {
        return view('siswa.create');
    }

    //simpan dalam request
    public function store(Request $request) {
        $input = $request->all();
        Siswa::create($input);
        return redirect('siswa');

        // $siswa = new Siswa;
        // $siswa -> nisn          = $request->nisn;
        // $siswa -> nama_siswa    = $request->nama_siswa;
        // $siswa -> tanggal_lahir = $request->tanggal_lahir;
        // $siswa -> jenis_kelamin = $request->jenis_kelamin;
        // $siswa -> save();
        // return redirect('siswa');

        //tampilan data belum ke database 
        // $siswa = $request->all();
        // return $siswa;
    }

    //show siswa
    public function show($id) {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id) {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update($id, Request $request) {
        $siswa = Siswa::findOrFail($id);
        $siswa -> update ($request -> all());
        return redirect ('siswa');
    }

    public function destroy($id) {
        $siswa = Siswa::findOrFail($id);
        $siswa -> delete();
        return redirect ('siswa');
    }

    public function dateMutator() {
        $siswa = Siswa::findOrFail(1);
        $nama = $siswa -> nama_siswa;
        $tanggal_lahir = $siswa -> tanggal_lahir -> format('d-m-Y');
        $ulang_tahun = $siswa -> tanggal_lahir -> addYears(30) -> format('d-m-Y');
        return "Siswa {$nama} lahir pada {$tanggal_lahir} . <br/> Ulang tahun Ke-30 akan jatuh pada {$ulang_tahun}.";
        
    }
    
  
    // protected $request;

    // public function __construct(Request $req)
    // {
    //     $this->request = $req;
    // }

    // public function store()
    // {
    //     $data = $this->request;
    //     $siswa = $data->all();
    // }
}
