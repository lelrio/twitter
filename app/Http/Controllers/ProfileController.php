<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
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

    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $me = Auth::user();
        $is_edit_profile = (Auth::id() == $user->id);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($user);
        return view('profile', ['user' => $user, 'is_edit_profile' => $is_edit_profile, 'is_follow_button' => $is_follow_button]);
    }
    public function index()
    {
        return view('home');
    }
}
