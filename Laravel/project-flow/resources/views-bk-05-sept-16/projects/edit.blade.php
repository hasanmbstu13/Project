@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('_partials.admin-sidebar')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Edit Projects</h1>

            {!! Form::open(array('route' => array('projects.update', $projects->id),'class'=>'form-horizontal col-sm-8','method' => 'PATCH')) !!}

                <div class="form-group">
                    <label for="project_no" class="col-sm-3 control-label">Project Number: </label>
                    <div class="col-sm-3">
                        {!! Form::text('project_no', Input::old('project_no') ? Input::old('project_no') : $projects->project_no, array('id'=>'project_no','class' => 'form-control','placeholder' => 'number')) !!}

                    </div>
                    <div class="col-sm-6">
                        {!! Form::text('project_text', Input::old('project_text') ? Input::old('project_text'): $projects->project_text, array('id'=>'project_text','class' => 'form-control','placeholder' => 'text')) !!}

                    </div>
                </div>

                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Project Name: </label>
                    <div class="col-sm-9">
                        {!! Form::text('project_name', Input::old('project_name') ? Input::old('project_name'):$projects->project_name, array('id'=>'project_name','class' => 'form-control')) !!}
                        @if ($errors->has('project_name')) <p class="help-block">{{ $errors->first('project_name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Company Name: </label>
                    <div class="col-sm-9">
                        {!! Form::text('company_name', Input::old('company_name') ? Input::old('company_name'):$projects->company_name, array('id'=>'company_name','class' => 'form-control')) !!}
                        @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Deadline: </label>
                    <div class="col-sm-9">
                        <div class='input-group date_picker'>
                            {!! Form::text('deadline', Input::old('deadline')?Input::old('deadline'):date('d-F-Y',strtotime($projects->deadline)), array('id'=>'deadline','class' => 'form-control')) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                        @if ($errors->has('deadline')) <p class="help-block">{{ $errors->first('deadline') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Project Leader: </label>
                    <div class="col-sm-9">
                        {!! Form::select('leader_id', $leader_options, Input::old('leader_id') ? Input::old('leader_id'):$projects->leader_id, ['class' => 'form-control','id'=>'leader_id'])!!}
                        @if ($errors->has('leader_id')) <p class="help-block">{{ $errors->first('leader_id') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Group: </label>
                    <div class="col-sm-9">
                        {!! Form::select('group', $leader_options, $group, ['multiple'=>'multiple','name'=>'group[]','class' => 'form-control jsSelect2','id'=>'group'])!!}
                        @if ($errors->has('group')) <p class="help-block">{{ $errors->first('group') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Description: </label>
                    <div class="col-sm-9">
                        {!! Form::textarea('description', Input::old('description') ? Input::old('description'): $projects->description, array('class' => 'form-control'))!!}
                        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
