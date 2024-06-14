<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PegawaiController extends Controller
{
    public function index()
    {
        $data_layout = [
            'title' => 'Halaman Pegawai',
        ];
        $data = [
            'username' => 'Irsal Fathi Farhat',
            'umur' => 21
        ];
        View::share($data_layout);
        return view('pegawai.index', $data);
    }
}
