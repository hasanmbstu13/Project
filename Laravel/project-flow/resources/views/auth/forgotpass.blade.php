@extends('layouts.jobs')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <form class="form-signin" method="POST" action="/auth/forgot-pass">
                    {!! csrf_field() !!}
                    <h2 class="form-signin-heading">Recover!!</h2>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" value="{{ old('email') }}" class="form-control" placeholder="Email address" required autofocus>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
