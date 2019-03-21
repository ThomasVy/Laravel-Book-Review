<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Book;
class CommentsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        abort_unless(auth()->user()->isAdmin()||$book->hasSubscribed(), 403);
        $validated = $request->validate([
          'Comment' => 'required|string|max:255',
        ]);
        $validated['text'] = $validated['Comment'];
        unset($validated['Comment']);
        $validated['book_id'] = $book->id;
        $validated['user_id'] = auth()->user()->id;
        Comment::create($validated);
        return redirect('/books/'. $book->id);
    }
}
