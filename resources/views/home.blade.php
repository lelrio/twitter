@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Tweet Zone</div>
                    <div class="card-body">
                        <h1>Hello {{ Auth::user()->username }} what would you like to say today ? </h1>

                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="d-flex">
                                <textarea type="text" name="text" placeholder="Let's Tweet !" style="outline: none; width: 300px; border: 0.5px solid lightgray; border-radius: 10px; height: 100px; padding:10px;"></textarea>

                                <button class="search1" type="submit" style="margin: 60px 0 0 20px">Send</button>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-5" style="padding: 0;">
                        @foreach($tweets as $tweet)
                            <div class="d-flex align-items-center">
                                <img src="/upload/{{ $tweet->user->avatar }}" style="width:50px; height:50px; border-radius:50%;">
                                <a href="/"><h2 style="margin: 10px">{{ $tweet->user->username }}</h2></a>
                            </div>
                            <h4>{{ $tweet->text }}</h4>
                            <div class="d-flex">
                                <a href="{{ url('/follows/' . $tweet->user->username) }}" class="btn-primary">
                                    <button type="button" class="btn btn-default">Follow</button>
                                </a>
                                <a href="{{ url('/unfollows/' . $tweet->user->username) }}" class="btn-warning">
                                    <button type="button" class="btn btn-default">Unfollow</button>
                                </a>
                                <form action="/delete" method="POST">
                                    @csrf
                                    <a name="id" value="{{ $tweet->id }}" class="btn-danger" >
                                        <button type="button" class="btn btn-default">Delete</button>
                                    </a>
                                </form>
                            </div>

                            <hr style="width: 100%; border: 1px solid black;">
                        @endforeach
                        <?php echo $tweets->render(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .accueil{
            color: rgb(29, 161, 242);
            font-size: 20px;
            font-weight: bold;

        }
        li{
            list-style: none;
            text-align: left;
        }
        .tweeter{
            background-color: rgb(29, 161, 242);
            color: white;
            border-radius: 25px;
            height:50px;
            width: 200px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Ubuntu, "Helvetica Neue", sans-serif;
            font-size: 15px;
            font-weight: bold;
            border: none;
        }
        .twitter{
            width: 50px;
        }
        .search{
            border-radius: 20px;
            padding: 0 20px 0 20px;
            border: rgb(29, 161, 242) 1px solid;
            height: 40px;
            width: 300px;
            outline: none;
        }
        .search1{
            border-radius: 20px;
            padding: 0 20px 0 20px;
            border: rgb(29, 161, 242) 1px solid;
            margin-left: 220px;
            height: 40px;
            width: 100px;
            outline: none;
        }
    </style>
@endsection
