<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with(['publishers', 'authors'])->orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $books,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'title' => $request->title
        ]);

        $book->publishers()->attach($request->publisher_id);
        $book->authors()->attach(explode(',', $request->author_ids));

        return response()->json([
            'data' => $book,
            'status' => 'Success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::where('id', $id)->update([
            'title' => $request->title
        ]);

        return response()->json([
            'data' => $book,
            'status' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $book->publishers()->detach();
        $book->authors()->detach();

        $book->delete();

        return response()->json($book, 300);
    }
}
