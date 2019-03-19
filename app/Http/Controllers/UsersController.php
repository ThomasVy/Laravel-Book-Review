<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('users.index', compact('users'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $subscription = $user->subscriptions;
        return view('users.show', [
          'user' => $user,
          'subscriptions' => $subscription,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $user->update($request->validate([
        'Email' => 'required|string|max:255',
        'Role' => 'required|not_in:0',
        'Birthday' => 'required|date',
        'Education_Field' => 'required|string|max:255',
      ]));
      return redirect('/users/');
    }
}
