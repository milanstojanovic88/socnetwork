@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('login.user') }}" method="POST">
                <h3>Insert your credentials.</h3>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember_me" id="remember_me" type="checkbox"> Remember me.
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sign in <span class="glyphicon glyphicon-ok"></span></button>
                    <button class="btn btn-default" type="reset">Reset <span class="glyphicon glyphicon-remove"></span></button>
                </div>

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection