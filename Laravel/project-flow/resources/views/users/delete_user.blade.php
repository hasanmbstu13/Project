@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('_partials.admin-sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">@if($role_id == 1 || $role_id == 2) {{'Change Project Manager'}} @elseif($role_id==3) {{'Change Design Lead'}} @endif</h2>
                {!! Form::open(array('route' => ['change_pm_delete_user',$user->id],'class'=>'form-horizontal col-sm-8','method' => 'POST')) !!}

                    <div class="form-group">
                        <label for="first_name" class="col-sm-5 control-label">Reassigned projects of {{ $user->nick_name }} To</label>
                        <div class="col-sm-7">
                             {!! Form::select('project_manager_or_lead', $user_lists_PM_DL, null, ['class' => 'form-control','id'=>'change-project-manager'])!!}
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
