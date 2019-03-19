<?php

namespace App\Http\Controllers;

use App\subscription;
use App\book;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscription = new Subscription();
        $subscription->book_id = $request->book_id;
        $subscription->user_id = auth()->user()->id;
        $subscription->save();
        //update book status
        return redirect('/books/'.$request->book_id.'');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscription $subscription)
    {
        //
    }
}
