<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            //$mahasiswa = DB::table('students')->get();
            $mahasiswa = Mahasiswa::all();
            dump($mahasiswa);
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
        }
        else{
           return Redirect::to("/")->withSuccess('Opps! You do not have access');
        }

    }
}
