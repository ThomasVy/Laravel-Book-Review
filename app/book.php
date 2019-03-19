<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
  protected $guarded = [];

  public $timestamps = false;

  public function hasSubscribed()
  {
      $check = DB::table('subscriptions')->where([
        ['user_id', '=', auth()->user()->id],
        ['book_id', '=', $this->id],
      ])->get();
      return(count($check));
  }
  public function isSubscribed()
  {
    $hasSubscribed = DB::table('subscriptions')->where([
      ['user_id', '=', auth()->user()->id],
      ['book_id', '=', $this->id],
    ])->latest('timestamp')->first();
    if($hasSubscribed && auth()->user()->id === $hasSubscribed->user_id){
      return true;
    }
     return false;
  }
}
