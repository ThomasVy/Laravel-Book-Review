<?php

namespace App\Imports;

use App\Author;
use Maatwebsite\Excel\Concerns\ToModel;
class AuthorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Author([
            'name' => $row[2],
        ]);
    }
}
