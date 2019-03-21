<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
class author extends Model
{
  protected $guarded = [];

  public $timestamps = false;
  public function book()
  {
    $this->hasMany(Wrote::class);
  }
}
