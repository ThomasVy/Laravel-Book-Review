<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
  protected $guarded = [];

  public $timestamps = false;

  public function book(){
    return $this->belongsTo(book::class);
  }
}
