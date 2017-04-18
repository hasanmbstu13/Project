@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('_partials.admin-sidebar')

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">User List</h2>
                <a href="{!! route('users.create') !!}" class="btn btn-primary" role="button">Create User</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Screen Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{!! $user->id !!}</td>
                                    <td>{!! $user->first_name !!}</td>
                                    <td>{!! $user->last_name !!}</td>
                                    <td>{!! $user->nick_name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->role_name !!}</td>
                                    <td>{!! $user->color_code !!}</td>
                                    <td>
                                       
                                        <a href="{!! route('userDelete',$user->id) !!}" class="btn btn-danger pull-right"
                                           role="button" style="margin-right: 5px;">
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                        </a>

                                        <a href="{!! route('users.edit',$user->id) !!}" class="btn btn-primary pull-right"
                                           role="button" style="margin-right: 5px;">
                                            <i class="glyphicon glyphicon-edit"></i> Edit
                                        </a>


                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      @if (Session::has('flash_message'))
        <p class="session-msg" style="display: none">{{ Session::pull('flash_message') }}</p>
      @endif
      @if (Session::has('flash_error'))
        <p class="session-error" style="display: none">{{ Session::pull('flash_error') }}</p>
      @endif
@endsection
@section('footer-script')
    {!! Html::script('assetes/js/pm.js') !!}
@endsection