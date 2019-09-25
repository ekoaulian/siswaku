<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use Storage;
use Session;
//use App\Http\Requests\SiswaRequest;

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
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        $list_hobi = Hobi::pluck('nama_hobi', 'id');
        return view('siswa.create', compact('list_kelas', 'list_hobi'));
    }

    //simpan dalam request
    public function store(Request $request) {
        $input = $request->all();
        //upload foto
        if ($request->hasFile('foto')){
            $foto   = $request->file('foto');
            $ext    = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name      = date('YmdHis'). ".$ext";
                $upload_path    = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto']  = $foto_name;
            }
        }
        $siswa = Siswa::create($input);

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->attach($request->input('hobi_siswa'));

        // Flash input / alert
        Session::flash('flash_message', 'Data Berhasill Disimpan...');
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

        if (!empty($siswa->telepon->nomor_telepon)) {
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }

        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        $list_hobi = Hobi::pluck('nama_hobi', 'id');
        return view('siswa.edit', compact('siswa', 'list_kelas', 'list_hobi'));
    }

    // public function update($id, Request $request) {
    public function update(Siswa $siswa, Request $request) {
        //$siswa = Siswa::findOrFail($id);
        //$siswa -> update ($request -> all());
        $input = $request -> all();
        // edit foto
        if ($request->hasFile('foto')){
            //hapus photo lama jika ada fotonya
            $exist = Storage::disk('foto')->exists($siswa->foto);
            if (isset($siswa->foto) && $exist){
                $delete = Storage::disk('foto')->delete($siswa->foto);
            }
            //upload baru
            $foto   = $request->file('foto');
            $ext    = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name      = date('YmdHis'). ".$ext";
                $upload_path    = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto']  = $foto_name;
            }
        }
        //update nomor telepon
        $siswa->update($input);
        if ($siswa->telepon) {
            //jika diisi update
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            //jika telp tidak diisi, hapus
            else {
                $siswa->telepon()->delete();
            }
        }
            //buat entri baru jika sebelumnya tidak ada no telp
            else {
                if ($request->filled('nomor_telepon')) {
                    $telepon = new Telepon;
                    $telepon->nomor_telepon = $request->input('nomor_telepon');
                    $siswa->telepon()->save($telepon);
                }
            }
        
        $siswa->hobi()->sync($request->input('hobi_siswa'));
        // Flash input / alert
        Session::flash('flash_message', 'Data Berhasill Diupdate...');
        return redirect ('siswa');
    }

    //public function destroy($id){
    public function destroy(Siswa $siswa) {
        // hapus kalau ada fotonya
        $exist = Storage::disk('foto')->exists($siswa->foto);
        if (isset($siswa->foto) && $exist){
            $delete = Storage::disk('foto')->delete($siswa->foto);
        }
        //$siswa = Siswa::findOrFail($id);
        $siswa -> delete();
        // Flash input / alert
        Session::flash('flash_message', 'Data Berhasill Dihapus...');
        Session::flash('penting', true);
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
