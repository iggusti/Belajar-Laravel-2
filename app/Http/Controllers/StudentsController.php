<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            
            $students = Student::all();

            // dump($students);

            $students = $students->sortBy('nama');
            

            // return view('students.index', ['students' => $students]);
        
            return view('students.index', compact('students'));
        }
        else{
           return Redirect::to("/")->withSuccess('Opps! You do not have access');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('students.create');
        }
        else{
           return Redirect::to("/")->withSuccess('Opps! You do not have access');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email|unique:students',
            'jurusan' => 'required',
            ]);

        // cara 1
        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nim = $request->nim;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;

        // $student->save();
        
        // cara 2
        // Student::create([
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        // ]);
        
        // cara 3
        // Student::create($request->all());

        Student::create([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'email' => $request['email'],
            'jurusan' => $request['jurusan']
            ]);

        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        if(Auth::check()){
            return view('students.show', compact('student'));
        }
        else{
           return Redirect::to("/")->withSuccess('Opps! You do not have access');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // Validation
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|size:10',
            'email' => 'required',
            'jurusan' => 'required'
        ]);   

        Student::where('id', $student->id)
                ->update([
                    'nama' => $request->nama,
                    'nim' => $request->nim,
                    'email' => $request->email,
                    'jurusan' => $request->jurusan
                ]);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Dihapus!');
    }
}
