<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index() {
        $halaman    = 'siswa';
        $siswa_list = Siswa::all();
        return view('siswa.index', compact('halaman', 'siswa_list'));
    }

    //halaman create
    public function create() {
        return view('siswa.create');
    }

    //simpan dalam request
    public function store(Request $request) {
        $siswa = $request->all();
        return $siswa;
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
