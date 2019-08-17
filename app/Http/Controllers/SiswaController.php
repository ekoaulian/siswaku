<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index() {
        $halaman    = 'siswa';
        //$siswa_list = Siswa::all();
        
        //sortir by descending
        $siswa_list = Siswa::all()->sortByDesc('tanggal_lahir');
        //menampilkan jumlah siswa
        $jumlah_siswa = $siswa_list->count();
        return view('siswa.index', compact('halaman', 'siswa_list', 'jumlah_siswa'));
    }

    //halaman create
    public function create() {
        $halaman = 'siswa';
        return view('siswa.create', compact('halaman'));
    }

    //simpan dalam request
    public function store(Request $request) {
        $siswa = new Siswa;
        $siswa -> nisn          = $request->nisn;
        $siswa -> nama_siswa    = $request->nama_siswa;
        $siswa -> tanggal_lahir = $request->tanggal_lahir;
        $siswa -> jenis_kelamin      = $request->jenis_kelamin;
        $siswa -> save();
        return redirect('siswa');

        //tampilan data belum ke database 
        // $siswa = $request->all();
        // return $siswa;
    }

    //show siswa
    public function show($id) {
        $halaman = 'siswa';
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('halaman', 'siswa'));
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
