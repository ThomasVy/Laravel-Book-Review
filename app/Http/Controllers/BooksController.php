<?php

namespace App\Http\Controllers;

use App\comment;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;
use App\book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BooksController extends Controller
{
  public static function import()
  {
    Excel::import(new BooksImport, 'SENG401-Lab4-Books.csv');
  }

  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('create'), 403);
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('create'), 403);
        $validated = $request->validate([
          'name' => 'required|string|max:255',
          'isbn' => 'required|max:13',
          'Publication_Year' => 'required|numeric|gt:0',
          'Publisher' => 'required|string|max:255',
          'Image' => 'required'
        ]);
        Book::create($validated);
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')
        ->where('comments.book_id', '=', $book->id)
        ->select('text', 'email', 'comments.timestamp')->get();
        // $comments = comment::where('book_id', '=', $book->id)->get();
       return view('books.show',
       ['book' => $book,
        'comments' => $comments,
       ]
      );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        abort_unless(\Gate::allows('create'), 403);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        abort_unless(\Gate::allows('create'), 403);
        $book->update($request->validate([
          'name' => 'required|string|max:255',
          'isbn' => 'required|max:13',
          'Publication_Year' => 'required|numeric|gt:0',
          'Publisher' => 'required|string|max:255',
          'Image' => 'required'
        ]));
        return redirect('/books/'. $book->id);
    }

    public function unsubscribe($book_id )
    {
        abort_unless(auth()->user() && auth()->user()->isSubscriber(), 403);
        $book = Book::findOrFail($book_id);
        $book->update([
            'subscription_status' => 1
        ]);
        return redirect('/books/'.$book_id.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(\Gate::allows('create'), 403);
        Book::findOrFail($id)->delete();
        return redirect('/books');
    }
}
