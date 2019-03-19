<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
  protected $guarded = [];

  public $timestamps = false;

  public function toggleSubscriptionStatus(){
    if($this->subcription_status === "Not Subscribed"){
      $this->subcription_status = "Subscribed";
    }
    else{
      $this->subscription_status = "Not Subscribed";
    }
  }
}
