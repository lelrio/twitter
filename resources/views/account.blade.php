@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-12 p-5 d-flex flex-md-row">
                <img src="/upload/{{ Auth::user()->avatar }}" style="height: 300px; width: 300px; border-radius:50%; margin-right:25px;">
                <div class="d-flex flex-column">
                    <h1>{{  $user->username }}'s Profile</h1>
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column">
                                <p>Username </p>
                                <input type="text" class="w-25" name="username" value="{{  $user->username }}">
                            </div>

                            <div class="d-flex flex-column">
                                <p>Email</p>
                                <input type="text" class="w-50" name="email" value="{{  $user->email }}">
                            </div>

                        </div>
                        <input type="submit" class="pull-right btn btn-sm btn-primary mt-5">
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
