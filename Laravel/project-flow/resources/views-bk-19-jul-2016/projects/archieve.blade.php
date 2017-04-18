@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('_partials.admin-sidebar')

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>

                <h2 class="sub-header">Projects List</h2>
                <a href="{!! route('projects.create') !!}" class="btn btn-primary" role="button">Create Project</a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <!-- <th>#ID</th> -->
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Company Name</th>
                            <th>Project Status</th>
                            <th>Hours Worked</th>
                           {{-- <th>Team Leader</th>--}}
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($jobs)
                            @foreach($jobs as $job)
                                <tr>
                                    <!-- <td>{!! $job->id !!}</td> -->
                                    <td>{!! $job->project_no.$job->project_text !!}</td>
                                    <td>{!! $job->project_name !!}</td>
                                    <td>{!! $job->company_name !!}</td>
                                    <td>{!! $job->status !!}</td>
                                    <td>{!! $job->spent_hours !!}</td>
                                   {{-- <td>{{ $job->teamleader->first_name.' '.$job->teamleader->last_name }}</td>--}}
                                    <td>{!! date('d-M-Y',strtotime($job->deadline)) !!}</td>
                                    <td>
                                        <a href="{!! route('projects.edit',$job->id) !!}" class="btn btn-primary"
                                           role="button">
                                            <i class="glyphicon glyphicon-edit"></i> Edit
                                        </a>
                                        {!! Form::open(array('url' => 'archive_project/'.$job->id , 'class' => 'pull-right del-button', 'onclick'=>'return confirm(\'Are you sure you want to Delete!!\')')) !!}
                                        {!!  Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-danger"><span
                                                    class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                        </button>
                                        
                                        {!! Form::close() !!}
                                        <a href="{!! route('export',$job->id) !!}" class="btn btn-success"
                                           role="button">
                                            <i class="glyphicon glyphicon-edit"></i> Export
                                            <!-- <span class="glyphicons glyphicons-file-cloud-download"></span> Export -->
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {!! $jobs->render() !!}
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