@extends('layouts.jobs')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-offset-4 home-signIn">
                {{-- <form class="form-signin" method="POST" action="/auth/login"> --}}
                <form class="form-signin" method="POST" action="/login">
                    {!! csrf_field() !!}
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" value="{{ old('email') }}" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <div class="checkbox clearfix">
                        <label class="pull-left">
                            <input type="checkbox" name="remember" value="true"> Remember me
                        </label>
                        <a class="pull-right" href="{!! route('forgotPass') !!}">Forgot Password?</a>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    
                </form>
               {{--  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
@endsection
