<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index(){

        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact("tweets"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $tweet = new Tweet;

        $tweet->text = $request->get('text');
        $tweet->user_id = Auth::user()->id;

        $tweet->save();

        return redirect()->route('home');
    }

    public function destroy(Request $request){
        $id = $request->id;
        $tweet = Tweet::find($id);
        $tweet->delete();
        return redirect()->route('home');
    }
}
