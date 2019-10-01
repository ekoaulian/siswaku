<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use Session;

class KelasController extends Controller
{
    public function index() {
        
        $kelas_list = Kelas::all();  
        return view('kelas/index', compact('kelas_list'));
    }

    //halaman create
    public function create() {
        return view('kelas.create');
    }

    //simpan dalam request
    public function store(KelasRequest $request) {
        Kelas::create($request->all());
        // Flash input / alert
        Session::flash('flash_message', 'Kelas Berhasill Disimpan...');
        return redirect('kelas');
    }

    public function edit(Kelas $kelas) {
        return view('kelas.edit', compact('kelas'));
    }

    // public function update($id, Request $request) {
    public function update(Kelas $kelas, KelasRequest $request) {
        $kelas -> update ($request -> all());
        // Flash input / alert
        Session::flash('flash_message', 'Kelas Berhasill Diupdate...');
        return redirect ('kelas');
    }

    //public function destroy($id){
    public function destroy(Kelas $kelas) {
        $kelas -> delete();
        // Flash input / alert
        Session::flash('flash_message', 'kelas Berhasill Dihapus...');
        Session::flash('penting', true);
        return redirect ('kelas');
    }
}
