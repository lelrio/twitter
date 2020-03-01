<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\User;
use Image;

class UserController extends Controller
{


    public function index(){

    }

    public function store(Request $request)
    {

    }

    public function account(){
        return view('account', array('user' => Auth::user()));
    }

    public function profile(){
        // j'ai test ca pour essayer de récup les messages avec l'id du user mais ca a pas marché ca affichait rien
        // $tweets = Tweet::orderBy('created_at', 'desc')->where('user_id' == Auth::user()->id);

        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(5);

        return view('profile', compact("tweets"), array('user' => Auth::user()));
    }

    public function follows($username)
    {
        // Find the User. Redirect if the User doesn't exist
        $user = User::where('username', $username)->firstOrFail();
        $id = Auth::id();
        $me = User::find($id);
        $me->following()->attach($user->id);

        return redirect('/home')->with('success','Vous suivez cette personne');

    }
    public function unfollows($username)
    {
        // Find the User. Redirect if the User doesn't exist
        $user = User::where('username', $username)->firstOrFail();
        $id = Auth::id();
        $me = User::find($id);
        $me->following()->detach($user->id);
        return redirect('/home')->with('success','Vous ne suivez plus cette personne');;
    }

    public function update_avatar(User $user, Request $request ){
        // Handle the user upload of avatar

        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $user = Auth::user();

        $user->username = request('username');
        $user->email = request('email');

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/upload/' . $filename ) );
            $user->avatar = $filename;
        }

        $user->save();

        return view('profile', array('user' => Auth::user()) );

    }

    public function destroy(){
        return view();
    }
}
