@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('_partials.admin-sidebar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Create New Project</h1>

            {!! Form::open(array('route' => 'projects.store','class'=>'form-horizontal col-sm-8')) !!}

                <div class="form-group">
                    <label for="project_no" class="col-sm-3 control-label">Project Number: </label>
                    <div class="col-sm-3">
                        {!! Form::text('project_no', Input::old('project_no'), array('id'=>'project_no','class' => 'form-control','placeholder' => 'number', 'required' => 'required')) !!}

                    </div>
                    <div class="col-sm-6">
                        {!! Form::text('project_text', Input::old('project_text'), array('id'=>'project_text','class' => 'form-control','placeholder' => 'text', 'required' => 'required')) !!}

                    </div>
                </div>

                <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Project Name: </label>
                    <div class="col-sm-9">
                        {!! Form::text('project_name', Input::old('project_name'), array('id'=>'project_name','class' => 'form-control', 'required' => 'required')) !!}
                        @if ($errors->has('project_name')) <p class="help-block">{{ $errors->first('project_name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                   <label for="project_manager" class="col-sm-3 control-label project_manager">Project Manager: </label>
                   <div class="col-sm-9">
                       {!! Form::select('project_manager', $project_manager_lists, null, ['class' => 'form-control','id'=>'project_manager','required' => 'required'])!!}
                       @if ($errors->has('project_manager')) <p class="help-block">{{ $errors->first('project_manager') }}</p> @endif
                   </div>
                </div>

                <!-- <div class="form-group">
                    <label for="company_name" class="col-sm-3 control-label">Company Name: </label>
                    <div class="col-sm-6">
                       {{--  {!! Form::text('company_name', Input::old('company_name'), array('id'=>'company_name','class' => 'form-control', 'required' => 'required')) !!}
                        @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif --}}
                    </div>
                </div> -->
                
               <!--  <div class="form-group">
                    <label for="deadline" class="col-sm-3 control-label">Deadline: </label>
                    <div class="col-sm-6">
                        <div class='input-group date_picker' id='date_picker'>
                            {{-- {!! Form::text('deadline', Input::old('deadline'), array('id'=>'deadline','class' => 'form-control datetimepicker', 'required' => 'required')) !!} --}}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                        {{-- @if ($errors->has('deadline')) <p class="help-block">{{ $errors->first('deadline') }}</p> @endif --}}
                    </div>
                </div> -->
                
                
                <div class="form-group">
                   <label for="leader_id" class="col-sm-3 control-label">Design Lead: </label>
                   <div class="col-sm-9">
                       {!! Form::select('leader_id', $leader_options, null, ['class' => 'form-control','id'=>'leader_id','required' => 'required'])!!}
                       @if ($errors->has('leader_id')) <p class="help-block">{{ $errors->first('leader_id') }}</p> @endif
                   </div>
                </div>

               <div class="form-group">
                   <label for="team_members" class="col-sm-3 control-label">Team Members: </label>
                   <div class="col-sm-9">
                       {!! Form::select('team_members', $leader_options, null, ['multiple' => 'multiple', 'name'=>'team_members[]','class' => 'form-control jsSelect2','id'=>'team_members','required' => 'required'])!!}
                       @if ($errors->has('team_members')) <p class="help-block">{{ $errors->first('team_members') }}</p> @endif
                   </div>
               </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
                </div>

                {{--  <div class="form-group">
                    <label for="project_name" class="col-sm-3 control-label">Description: </label>
                    <div class="col-sm-9">
                        {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control'))!!}
                        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                    </div>
                </div> --}}
 

                
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{-- <div class="dc-url" style="display: none">
  @if (Session::has('flash_message'))
    <p class="session-msg">{{ Session::pull('flash_message') }}</p>
  @endif
</div> --}}
@endsection

@section('footer-script')
    {!! Html::script('assetes/js/main.js') !!}
@endsection

