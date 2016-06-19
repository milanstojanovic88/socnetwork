@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="animation-container">
                <span>S</span>
                <span>O</span>
                <span>C</span>
                <span>I</span>
                <span>A</span>
                <span>L</span><br>
                <span>N</span>
                <span>E</span>
                <span>T</span>
                <span>W</span>
                <span>O</span>
                <span>R</span>
                <span>K</span>
            </div>
        </div>
        <div class="col-md-4">
            <h4>Don't have an account yet? Register below.</h4><br>
            @if(count($errors))
                <div class="alert alert-danger" role="alert">
                    <ul><b>Error registering!</b>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.user') }}" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="full_name">Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"  value="{{ old('full_name') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sign up <span class="glyphicon glyphicon-ok"></span></button>
                    <button class="btn btn-default" type="reset">Reset <span class="glyphicon glyphicon-remove"></span></button>
                </div>

                {{ csrf_field() }}

            </form>
        </div>
    </div>
@endsection
