@extends('layouts.jobs')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('_partials.admin-sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">Create New User</h2>
                {!!  Form::open(array('route' => 'users.store','class'=>'form-horizontal')) !!}

                    <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label">First Name:</label>
                        <div class="col-sm-6">
                            {!! Form::text('first_name', Input::old('first_name'), array('class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'First Name', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
                        <div class="col-sm-6">
                            {!! Form::text('last_name', Input::old('last_name'), array('class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Last Name', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nick_name" class="col-sm-2 control-label">Screen Name:</label>
                        <div class="col-sm-6">
                            {!! Form::text('nick_name', Input::old('nick_name'), array('class' => 'form-control', 'id' => 'nick_name', 'placeholder' => 'Nick Name', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                            {!! Form::email('email', Input::old('email'), array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'required' => '')) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-6">
                            {!! Form::password('password', array('class' => 'form-control', 'id' => 'inputPassword3', 'placeholder' => 'Password', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Retype Password</label>
                        <div class="col-sm-6">
                            {!! Form::password('repassword', array('class' => 'form-control', 'id' => 'inputPassword5', 'placeholder' => 'Password Again', 'required' => '')) !!}

                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('user_role')) has-error @endif">
                        <label for="user_role" class="col-sm-2 control-label">User Role</label>
                        <div class="col-sm-6">
                            {!! Form::select('user_role', $role_options, null, ['class' => 'form-control','id'=>'user_role'])!!}
                            @if ($errors->has('user_role')) <p class="help-block">{{ $errors->first('user_role') }}</p> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="color_code" class="col-sm-2 control-label">Background Color:</label>
                        <div class="col-sm-6">
                            {!! Form::text('color_code', Input::old('color_code')?Input::old('color_code'):"#FFFFFF", array('class' => 'form-control color_picker no-alpha', 'id' => 'color_code', 'placeholder' => 'Color Code', 'required' => '')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="font_color" class="col-sm-2 control-label">Font Color:</label>
                        <div class="col-sm-6">
                            {!! Form::text('font_color', Input::old('font_color')?Input::old('font_color'):"#000000", array('class' => 'form-control color_picker no-alpha', 'id' => 'font_color', 'placeholder' => 'Font', 'required' => '')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Add</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
