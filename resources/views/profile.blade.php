@extends('layouts.app')

@section('content')
    <div class="container card col-8 d-flex flex-md-row p-5">
        <div class="d-flex">
            <img src="/upload/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%;">

            <h1 class="ml-3">{{  $user->username }}'s Profile</h1>
            <a href="{{ url('/follows/' . $user->username) }}" class="navbar-btn navbar-right">
                <button type="button" class="btn btn-default">Follow</button>
            </a>
            <a href="{{ url('/unfollows/' . $user->username) }}" class="navbar-btn navbar-right">
                <button type="button" class="btn btn-default">Unfollow</button>
            </a>
        </div>
    </div>

    <div class="container card d-flex col-8 flex-column justify-content-center align-items-center mt-2">
        <nav class="row">
            <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" style="width: 348px" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tweets</a>
                <a class="nav-item nav-link" id="nav-profile-tab"style="width: 348px"  data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Followers</a>
                <a class="nav-item nav-link" id="nav-contact-tab"style="width: 348px"  data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Following</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                @foreach($tweets as $tweet)
                    <div class="d-flex">
                        <img src="/upload/{{ $tweet->user->avatar }}" style="width:50px; height:50px; border-radius:50%;">
                        <h2 style="margin: 10px">{{ $tweet->user->username }}</h2>
                    </div>
                    <h4>{{ $tweet->text }}</h4>

                    <hr style="width: 100%; border: 1px solid black;">
                @endforeach
                <?php echo $tweets->render(); ?>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p>Affichage des followers</p>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <p>Affichage des following</p>
            </div>
        </div>
    </div>
@endsection
