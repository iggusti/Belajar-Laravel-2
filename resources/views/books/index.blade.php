@extends('dashboard')

@section('title', 'Buku')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-5">
            <h1 class="mt-3">Daftar Buku</h1>
            <h2 class="mt-3">Welcome {{ ucfirst(Auth()->user()->name) }}</h2>
            <!-- <a href="/students/create" class="btn btn-primary my-3">Tambah Data Mahasiswa</a>
           
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif -->
           
            <ul class="list-group">
           
                
                @foreach( $books as $book )
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $book->book }}
                    <a href="/books/{{ $book->id }}" class="badge badge-info">detail</a>
                </li>
                @endforeach
                
           
            </ul>
        </div>
    </div>
</div>
@endsection