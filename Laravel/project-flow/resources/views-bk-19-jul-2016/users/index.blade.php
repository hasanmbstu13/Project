@extends('layouts.jobs')
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
                                        {!! Form::open(array('url' => 'users/'.$user->id , 'class' => 'pull-right del-button', 'onclick'=>'return confirm(\'Are you sure you want to Delete!!\')')) !!}
                                        {!!  Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-danger"><span
                                                    class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                        </button>
                                        {!! Form::close() !!}

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
    <div class="dc-url" style="display: none">
      @if (Session::has('flash_message'))
        <p class="session-msg">{{ Session::pull('flash_message') }}</p>
      @endif
    </div>
@endsection
@section('footer-script')
    {!! Html::script('assetes/js/pm.js') !!}
@endsection