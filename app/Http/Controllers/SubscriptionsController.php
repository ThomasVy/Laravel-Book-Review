<?php

namespace App\Http\Controllers;

use App\Rules\BookExistsRule;
use App\Rules\SubscribableRule;
use App\subscription;
use App\book;
use App\user;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscription = new Subscription();
        //$this->authorize('update', $subscription);
        $subscription->book_id = $request->book_id;
        $subscription->user_id = auth()->user()->id;
        $subscription->active = 1;
        $subscription->save();
        //update book status
        $book = Book::findOrFail($request->book_id);
        $book->update([
            'subscription_status' => 0
        ]);
        return redirect('/books/'.$request->book_id);
    }

    public function adminStore(Request $request, User $user)
    {
      $validate = $request->validate([
            'isbn'  => [new BookExistsRule, new SubscribableRule]
      ]);
      $book = Book::where('ISBN', $request->isbn)->first();
      unset($validate['isbn']);
      $validate['book_id'] = $book->id;
      $validate['user_id'] = $user->id;
      Subscription::create($validate);
      $book->update([
          'subscription_status' => 0
      ]);
      return back();

    }
    public function destroy(Subscription $subscription)
    {
      $subscription->update([
          'active' => 0
      ]);
      Book::findOrFail($subscription->book_id)->update([
          'subscription_status' => 1
      ]);
      return back();
    }

}
