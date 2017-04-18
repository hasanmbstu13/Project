@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('_partials.admin-sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">Edit User</h2>
                {!!  Form::model($user,array('route' => ['users.update',$user->id],'class'=>'form-horizontal col-sm-8','method' => 'PATCH')) !!}

                    <div class="form-group">
                        <label for="first_name" class="col-sm-3 control-label">First Name:</label>
                        <div class="col-sm-9">
                            {!! Form::text('first_name', Input::old('first_name'), array('class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'First Name', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-3 control-label">Last Name:</label>
                        <div class="col-sm-9">
                            {!! Form::text('last_name', Input::old('last_name'), array('class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Last Name', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nick_name" class="col-sm-3 control-label">Screen Name:</label>
                        <div class="col-sm-9">
                            {!! Form::text('nick_name', Input::old('nick_name'), array('class' => 'form-control', 'id' => 'nick_name', 'placeholder' => 'Nick Name', 'required' => '')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            {!! Form::email('email', Input::old('email'), array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'required' => '')) !!}

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Change Password?</label>
                        <div class="col-sm-9">
                            {!! Form::password('password', Input::old('password'), array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'required' => '')) !!}

                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('user_role')) has-error @endif">
                        <label for="user_role" class="col-sm-3 control-label">User Role</label>
                        <div class="col-sm-9">
                            {!! Form::select('user_role', $role_options, Input::old('user_role')?Input::old('user_role'):$role_id, ['class' => 'form-control','id'=>'user_role'])!!}
                            @if ($errors->has('user_role')) <p class="help-block">{{ $errors->first('user_role') }}</p> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="color_code" class="col-sm-3 control-label">Background Color:</label>
                        <div class="col-sm-9">
                            {!! Form::text('color_code', Input::old('color_code'), array('class' => 'form-control color_picker no-alpha',  'id' => 'color_code', 'placeholder' => 'Color Code', 'required' => '')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="font_color" class="col-sm-3 control-label">Font Color:</label>
                        <div class="col-sm-9">
                            {!! Form::text('font_color', Input::old('font_color'), array('class' => 'form-control font_color no-alpha', 'id' => 'font_color', 'placeholder' => 'Font Color', 'required' => '')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
