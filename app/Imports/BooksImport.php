<?php

namespace App\Imports;

use App\Book;
use App\Author;
use App\Wrote;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BooksImport implements ToCollection
{
    public function collection(Collection $rows)
    {
      foreach($rows as $row)
      {
        $book = Book::create(
                    ['name' => $row[1],
                    'isbn' =>$row[0],
                    'publication_year' => $row[3],
                    'publisher'=> $row[4],
                    'image' => $row[5]]);
        $author;
        try{
          $author = Author::create([
                      'name' => $row[2]]);
          $author = $author->fresh();
        }catch(\Illuminate\Database\QueryException $e )
        {
            $author = Author::where('name', $row[2])->first();
        }
        $book = $book->fresh();
        Wrote::create([
                    'book_id' => $book->id,
                    'author_id' => $author->id,
          ]);
      }
    }
}
