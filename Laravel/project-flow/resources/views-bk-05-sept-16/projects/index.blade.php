@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('_partials.admin-sidebar')

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>

                <h2 class="sub-header">Projects List</h2>
                @if ($role_id == 1 || $role_id == 2)
                  <a href="{!! route('projects.create') !!}" class="btn btn-primary" role="button">Create New Project</a>                 
                @endif

                <div class="table-responsive">

                     

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <!-- <th>#ID</th> -->
                            <th>Project Number</th>
                            <th>Project Name</th>
                            {{-- <th>Company Name</th> --}}
                            <th>Project Manager</th>
                            <th>Project Status</th>
                            <th>Hours Worked</th>
                           {{-- <th>Team Leader</th>--}}
                            {{-- <th>Deadline</th> --}}
                            @if ($role_id == 1 || $role_id == 2)
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if($jobs)
                            @foreach($jobs as $job)
                                <tr>
                                    <!-- <td>{!! $job->id !!}</td> -->
                                    <td class="text-center">{!! $job->project_no.' '.$job->project_text !!}</td>
                                    <td class="text-center">{!! $job->project_name !!}</td>                                    
                                    <td class="manager text-center">
                                    
                                      @if ($role_id == 3)
                                        {{ $job->projectmanager->nick_name }}  
                                       @else
                                        <a href="#" class="group" data-type="select" data-name="group" data-pk="{{$job->id}}" data-value="{{$job->project_manager}}" data-source="{{ $project_manager_lists }}" data-original-title="Select manager" data-url="{{route('changeProjectManager',$job->id)}}">
                                         {{ $job->projectmanager->nick_name }}  
                                        </a>
                                      @endif
                                                                                                                   
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            if ($job->status == 'development') {
                                                $job->status = 'With Studio';
                                            } elseif ($job->status == 'feedback') {
                                                $job->status = 'Client';
                                            } elseif($job->status == 'default') {
                                                $job->status = 'With Client Service Team';
                                            } 
                                        ?>
                                        {!! $job->status !!}
                                    </td>
                                    <td class="text-center">{!! $job->spent_hours !!}</td>
                                    {{-- <td>{{ date('d-M-Y',strtotime($job->deadline)) }}</td> --}}
                                    @if ($role_id == 1 || $role_id == 2)
                                       <td class="text-center">
                                          
                                               <a href="{!! route('projects.edit',$job->id) !!}" class="btn btn-primary"
                                                  role="button">
                                                   <i class="glyphicon glyphicon-edit"></i> Edit
                                               </a>

                                               <a href="{!! route('archive_a_project',$job->id) !!}" class="btn btn-warning"
                                                  role="button">
                                                   <i class="glyphicon glyphicon-ok"></i> Archive
                                               </a>
                                           @if ($role_id == 1)
                                               {!! Form::open(array('url' => 'projects/'.$job->id , 'class' => 'pull-right del-button', 'onclick'=>'return confirm(\'Are you sure you want to Delete!!\')')) !!}
                                               {!!  Form::hidden('_method', 'DELETE') !!}
                                               <button type="submit" class="btn btn-danger"><span
                                                           class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                               </button>
                                               
                                               {!! Form::close() !!}
                                               <a href="{!! route('export',$job->id) !!}" class="btn btn-success"
                                                  role="button">
                                                   <i class="glyphicon glyphicon-save-file"></i> Export
                                               </a>
                                           @endif
                                       </td>
                                    @endif
                                </tr>
                            @endforeach

                        @endif
                        </tbody>
                    </table>
                </div>                    
            </div>
        </div>
         <?php echo $jobs->appends(Request::except('page'))->render(); ?>
    </div>

    @if (Session::has('flash_message'))
      <p class="session-msg" style="display: none">{{ Session::pull('flash_message') }}</p>
    @endif
    @if (Session::has('flash_error'))
      <p class="session-error" style="display: none">{{ Session::pull('flash_error') }}</p>
    @endif
    
@stop

@section('footer-script')
    {!! Html::script('assetes/js/bootstrap-editable/js/bootstrap-editable.js') !!}    
    {!! Html::script('assetes/js/editable.js') !!}
@stop



