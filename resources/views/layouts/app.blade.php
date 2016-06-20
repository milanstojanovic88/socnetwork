<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Social Network</title>

        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
        <link rel="stylesheet" href="{{ URL::to('/src/bootstrap/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ URL::to('/src/css/app.css') }}">

        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
        <script src="{{ URL::to('/src/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::to('/src/bootstrap/bootstrap.min.js') }}"></script>

        <script src="{{ URL::to('/src/js/javaScript.js') }}"></script>

    </head>
    <body>
         <nav class="navbar navbar-default navbar-black">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('welcome') }}">MySocialNetwork</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @if(Auth::user())
                            <li><a href="{{ route('home') }}">Home</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::user())
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
         </nav>
         <div class="container">
             @yield('content')
         </div>
         @if(Auth::user())
            <div class="chat-container">
                <div class="users-list-container">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#">
                                Connected
                                <img src="{{ URL::to('images/dummy-image.jpg') }}" alt="" class="user-chat-image img-responsive">
                                <span class="con-status connected glyphicon glyphicon-globe"></span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                Disconnected
                                <img src="{{ URL::to('images/dummy-image.jpg') }}" alt="" class="user-chat-image img-responsive">
                                <span class="con-status disconnected glyphicon glyphicon-globe"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="chat-controls-container">
                    <button class="btn btn-primary chat-button chat-expand" data-expand="expanded">Hide</button>
                    <button class="btn btn-success chat-button chat-connect">Connect</button>
                </div>
            </div>
         @endif
    </body>
</html>
