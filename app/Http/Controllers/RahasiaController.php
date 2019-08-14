<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RahasiaController extends Controller
{
    public function halamanrahasia() {
        return 'Anda Sedang melihat <b> Halaman Rahasia </b>';
    }

    public function showMeSecret() {
        $url = route('secret');
        $link = '<a href="' . $url . '">Kehalaman Rahasia</a>';
        return $link;
    }
    
}
