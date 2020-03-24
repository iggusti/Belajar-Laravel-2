<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;

class BooksController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $books = Book::all();

            //return view('books.index', ['books' => $books]);
            // dump($books);
            return view('books.index', compact('books'));
        }
        else{
           return Redirect::to("/")->withSuccess('Opps! You do not have access');
        }

    }
}
