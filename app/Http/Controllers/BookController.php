<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::with(['publishers', 'authors'])->orderBy('id', 'desc')->paginate(10);

        return view('index', compact('books'));
    }
}
