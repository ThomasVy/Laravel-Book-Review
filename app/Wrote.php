<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
class Wrote extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function book()
    {
      return $this->belongsTo(Book::class);
    }
    public function author()
    {
      return $this->belongsTo(Author::class);
    }
}
