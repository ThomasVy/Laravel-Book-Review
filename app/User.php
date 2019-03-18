<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_creation_timestamp' => 'datetime',
    ];

    public function isAdmin(){
        $role = $this->role;
        if($role === 'Admin')
        {
          return true;
        }else{
          return false;
        }
    }
    public function isSubscriber(){
        $role = $this->role;
        if($role === 'Subscriber')
        {
          return true;
        }else{
          return false;
        }
    }
}
