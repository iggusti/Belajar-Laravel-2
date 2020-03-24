<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        //$mahasiswa = DB::table('students')->get();
        $mahasiswa = Mahasiswa::all();
        dump($mahasiswa);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }
}
