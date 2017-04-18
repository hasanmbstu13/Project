@extends('layouts.jobs')
@section('body_class', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('_partials.admin-sidebar')

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                {{-- <h1 class="page-header">Dashboard</h1> --}}

                <h1 class="sub-header">Projects List</h1>
                 @if ($role_id == 1 || $role_id == 2)
                  <a href="{!! route('projects.create') !!}" class="btn btn-primary" role="button">Create New Project</a>                 
                @endif

                <div class="table-responsive scroll" id="content">                  

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <!-- <th>#ID</th> -->
                            {{-- <th>Project Number<a href="{{route('projects.index')}}?sort=@if(Request::input('sort','asc')=='asc')desc @else asc @endif&sort_col_name=project_no"><span class="glyphicon glyphicon-triangle-top"></span></a></th> --}}
                            <th><a href="{{route('projects.index')}}?sorting_column=project_no&@if($sort_order=='ASC')sort_order=DESC @else sort_order=ASC @endif">@if($sort_order=='ASC')Project Number <span class="glyphicon glyphicon-triangle-bottom  glyphicon-color">@else Project Number <span class="glyphicon glyphicon-triangle-top glyphicon-color"></span>@endif</a></th>
                            <th>Project Name</th>
                            {{-- <th>Company Name</th> --}}
                            <th><a href="{{route('projects.index')}}?sorting_column=project_manager&@if($sort_order=='ASC')sort_order=DESC @else sort_order=ASC @endif">@if($sort_order=='ASC')Project Manager / Design Lead <span class="glyphicon glyphicon-triangle-bottom glyphicon-color">@else Project Manager / Design Lead <span class="glyphicon glyphicon-triangle-top glyphicon-color"></span>@endif</a></th>
                            <th><a href="{{route('projects.index')}}?sorting_column=status&@if($sort_order=='ASC')sort_order=DESC @else sort_order=ASC @endif">@if($sort_order=='ASC')Project Status <span class="glyphicon glyphicon-triangle-bottom glyphicon-color">@else Project Status <span class="glyphicon glyphicon-triangle-top glyphicon-color"></span>@endif</a></th>
                            {{-- <th>Project Status <a href="{{route('projects.index')}}?sorting_column=status&@if($sort_order=='ASC')sort_order=DESC @else sort_order=ASC @endif">@if($sort_order=='ASC')<span class="glyphicon glyphicon-triangle-bottom glyphicon-color">@else<span class="glyphicon glyphicon-triangle-top glyphicon-color"></span>@endif</a></th> --}}
                            <th>Hours Worked</th>
                            <th>Created On</th>
                           {{-- <th>Team Leader</th>--}}
                            {{-- <th>Deadline</th> --}}
                            @if ($role_id == 1 || $role_id == 2)
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="tbodyLoadedData" id="tbodyLoadedData">
                        @if($jobs)
                              @foreach($jobs as $job)                                                       
                                  <tr class="projects">
                                      <!-- <td>{!! $job->id !!}</td> -->
                                      <td class="text-center">{!! $job->project_no.' '.$job->project_text !!}</td>
                                      <td class="text-center">{!! $job->project_name !!}</td>                                    
                                      <td class="text-center">
                                      
                                        @if ($role_id == 3)
                                          {{ $job->projectmanager->nick_name }} / @if(count($job->teamleader)) {{ $job->teamleader->nick_name }} @else {{'Empty'}} @endif 
                                         @else
                                          <a href="#" class="group" data-type="select" data-name="group" data-pk="{{$job->id}}" data-value="{{$job->project_manager}}" data-source="{{ $project_manager_lists }}" data-original-title="Select manager" data-url="{{route('changeProjectManager',$job->id)}}">
                                          {{-- <a href="#" class="group manager" data-pk="{{$job->id}}" data-value="{{$job->project_manager}}" data-source="{{ $project_manager_lists }}"  data-url="{{route('changeProjectManager',$job->id)}}"> --}}
                                           {{-- {{ $job->projectmanager->nick_name }}   --}}
                                          </a>  
                                          /
                                            <a href="#" class="group" data-type="select" data-name="design-lead" data-pk="{{$job->id}}" data-value="{{$job->leader_id}}" data-source="{{ $design_lead_lists }}" data-original-title="Select design lead" data-url="{{route('changeDesignLead',$job->id)}}">
                                           {{-- {{ $job->teamleader->nick_name }}   --}}
                                          </a>
                                        @endif
                                                                                                                     
                                      </td>
                                      <td class="text-center">
                                          <?php
                                              if ($job->status == 'development') {
                                                  $job->status = 'With Studio';
                                              } elseif ($job->status == 'feedback') {
                                                  $job->status = 'With Client';
                                              } elseif($job->status == 'default') {
                                                  $job->status = 'With Client Service Team';
                                              } elseif($job->status == 'completed') {
                                                  $job->status = 'Completed';
                                              } 
                                          ?>
                                          {!! $job->status !!}
                                      </td>
                                      <td class="text-center">{!! $job->spent_hours !!}</td>
                                      <td>{{ date('d-M-Y  h:i',strtotime($job->created_at)) }}</td>
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
                <div id="pagination">
                  <a href="{!!$jobs->nextPageUrl()!!}" class="next">next</a>
                </div>
                
                 {{-- @include('pagination.default', ['paginator' => $jobs])     --}}
                 
            </div>
        </div>
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
    {!! Html::script('assetes/js/infinite-ajax-scroll/src/jquery-ias.js') !!}   
    {!! Html::script('assetes/js/infinite-ajax-scroll/src/callbacks.js') !!}   
    {!! Html::script('assetes/js/infinite-ajax-scroll/src/extension/spinner.js') !!}   
    {!! Html::script('assetes/js/editable.js') !!}
@stop



