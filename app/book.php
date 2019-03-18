<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
  protected $guarded = [];

  public $timestamps = false;
  public function comments(){
      return $this->join('comments', 'comments.book_id', '=', "books.id")
      ->join('users', 'comments.user_id', '=', 'users.id')
      ->select('comments.text', 'users.email')->get();
  }
}
