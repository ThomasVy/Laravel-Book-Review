<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
  protected $guarded = [];

  public $timestamps = false;
  public function users(){
      return $this->belongsTo(User::class);
  }
}
