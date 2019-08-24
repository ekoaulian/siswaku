<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    protected $dates = ['tanggal_lahir'];

    //nama siswa menjadi huruf kapital per kata
    public function getNamaSiswaAttribute($nama_siswa) {
        return ucwords($nama_siswa);
    }

    public function telepon() {
        return $this->hasOne('App\Telepon', 'id_siswa');
    }

    //nama siswa pada create kata ke dua kapital
    // public function setNamaSiswaAttribute($nama_siswa) {
    //     return strtolower($nama_siswa);
    // }
}
