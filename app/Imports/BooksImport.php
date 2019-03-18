<?php

namespace App\Imports;

use App\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'name' => $row[1],
            'isbn' =>$row[0],
            'publication_year' => $row[3],
            'publisher'=> $row[4],
            'subscription_status' => "Not subscribed", 
            'image' => $row[5],
        ]);
    }
}
