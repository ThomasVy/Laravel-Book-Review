<?php

namespace App\Http\Controllers;

use App\author;
use Illuminate\Http\Request;
use App\Imports\AuthorImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    public static function import()
    {
      Excel::import(new AuthorImport, 'SENG401-Lab4-Books.csv');
    }

    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = author::all();
        return view('Authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('create'), 403);
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191'
        ]);
        Author::create($validated);
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        abort_unless(\Gate::allows('update'), 403);
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, author $author)
    {
        {
            abort_unless(\Gate::allows('update'), 403);
            $author->update($request->validate([
              'name' => 'required|string|max:255',
            ]));
            return redirect('/authors');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        abort_unless(\Gate::allows('destroy'), 403);
        Author::findOrFail($author->id)->delete();
        return redirect('/authors');
    }
}
