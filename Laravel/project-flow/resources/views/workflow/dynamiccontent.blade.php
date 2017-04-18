<div class="row main-content new-content">                
  <div class="row">
    <div class="col-sm-10 col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="col-sm-2">Name</th>
              <th class="col-sm-2">Now working on</th>
              <th class="col-sm-8">Queued briefings</th>
            </tr>
          </thead>
          <tbody>
            @if($user_works)
            @foreach($user_works as $user)
            <tr>
              <td class="user">
                @if (empty($user->nick_name))
                  {{ $user->first_name }}
                @else
                  {{ $user->nick_name }}
                @endif
                {{-- <button class="popper project-content" data-toggle="popover" data-trigger="focus"> --}}
                <button class="popper project-content" data-toggle="popover">
                  <span class="glyphicon glyphicon-forward project-content"></span>
               </button>

               @if(count($user->leader))
                  <div class="popper-content hide">
                      <h5 class="pop-heading">I am the leader of this projects. <span class="glyphicon glyphicon-remove removePopover" id="remove"></span></h5>
                     
                          <ul>
                              @foreach($user->leader as $project_leader)
                                  <li>{{ $project_leader->project_no.' '.$project_leader->project_text }}</li>
                              @endforeach
                          </ul>  
                          @include('leaves.leave_info')                                           
                  </div>
                  @else
                    <div class="popper-content hide">
                      <p>{{ 'I\'m not leader of any project' }} <span class="glyphicon glyphicon-remove removePopover" id="remove"></span></p>
                      @include('leaves.leave_info')
                    </div>
                @endif
            </td>
              <td class="work">
                <?php 
                  // Current datetime
                  $current_time = Carbon\Carbon::now();
                  $current_date = date('Y-m-d', strtotime($current_time));                   
                  // Extract leave Info
                  $leave_info   = $user->leaves()->orderBy('created_at','desc')->first();  
                  if($leave_info) {
                    $start_date   = date('Y-m-d', strtotime($leave_info->start_date));
                    $end_date     = date('Y-m-d', strtotime($leave_info->end_date));
                    // $end_date     = date('Y-m-d g:i:s', strtotime($leave_info->end_date));                    
                  }               
                ?>
                @if ($leave_info && $current_date >= $start_date && $end_date >= $current_date)
                  {{-- @if ($end_date >= $current_date && $current_date >= $start_date) --}}
                    <p class="leave-description">{{ucwords($leave_info->leave_type)}} Leave</p>  
                  {{-- @endif --}}
                @elseif(count($user->works))
                @foreach($user->works as $work)
                @if ($work->status == 'started')                                  
                <?php $add_dot_with_brief = mb_strimwidth($work->task, 0, 12, ".."); ?>
                <a href="{{route('briefProjectStatus',array('id'=>$work->id))}}" class="brief_this" data-toggle="modal" data-target="#prstatusModal" data-remote="false"> 
                 <mark style="background-color: {{ $work->project->projectmanager->color_code }}; color: {{ $work->project->projectmanager->font_color }};">{{ $work->project->project_no.$work->project->project_text }}/<span class="brief_no">{{$work->brief_number}}</span><span class="brief-des">{{$add_dot_with_brief}}</span></mark>
               </a>
               @endif
               @endforeach
               @endif
             </td>
             <td class="queue">
              @if (count($user->works))
              @foreach($user->works as $work)
              @if ($work->status == 'queued') 
              <?php $add_dot_with_brief = mb_strimwidth($work->task, 0, 12, ".."); ?>                                             
              <a href="{{route('briefProjectStatus',array('id'=>$work->id))}}" class="brief_this" data-toggle="modal" data-target="#prstatusModal" data-remote="false"> 
                <mark style="background-color: {{ $work->project->projectmanager->color_code }}; color: {{ $work->project->projectmanager->font_color }};">{{ $work->project->project_no.$work->project->project_text }}/<span class="brief_no">{{$work->brief_number}}</span><span class="brief-des">{{$add_dot_with_brief}}</span></mark>
             </a>                                                                                                                                         
             @endif
             @endforeach
             @endif      
           </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table><!-- /.table -->
      </div><!-- /.table-responsive -->
    </div>

    <div class="col-sm-2 col-xs-12 panel-area">
      @if ($role_id == 2 || $role_id == 3)
        <div class="show-project">
          <button id="show-my-project" class="btn btn-default show-my-project">Show only my projects</button> 
        </div>
      @endif
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">With Studio</h3>
        </div>
        <div class="panel-body">
          <ul class="list-inline sort_list studio_sortable_list" id="queue_dropable" data-area="studio">
            @if($studio_works)
            @foreach($studio_works as $work)
            @if($work->status == 'development')
            <?php $add_dot_with_project_name = mb_strimwidth($work->project_name, 0, 12, ".."); ?>
            <li class="project-{!! $work->id !!}
              @if ($role_id == 2)
                @if($logged_in_user == $work->project_manager) item-elements @else ignore-elements @endif
              @elseif($role_id == 3) @if(count($work->designer_project($work->id,$logged_in_user))) item-elements @else ignore-elements @endif
              @endif"
              data-pid="{!! $work->id !!}">
              <div class="panel">
                <div class="panel-heading" style="background-color: {!! $work->projectmanager->color_code !!};">
                @if ($role_id == 1 || $role_id == 2)
                <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                  <mark style="color: {{ $work->projectmanager->font_color }};">{{  $work->project_no.' '.$work->project_text }}/{{  $add_dot_with_project_name }}</mark>
                </a>
                @elseif($role_id == 3)
                <h3 class="panel-title"><mark style="color: {{ $work->projectmanager->font_color }};">{!! $work->project_no.' '.$work->project_text !!}/{{  $add_dot_with_project_name }}</mark></h3>
                @endif                                                    
              </div>
            </div>
          </li>
          @endif
          @endforeach
          @endif
          </ul>
        </div>
      </div><!-- /.panel -->

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">With Client Service</h3>
        </div>
        
        <div class="panel-body">
          <ul class="list-inline sort_list client_sortable_list" id="client_dropable" data-area="client">
              @if($studio_works)
              @foreach($studio_works as $work)
              @if($work->status == 'default' || $work->status == 'studio-feedback')
              <?php $add_dot_with_project_name = mb_strimwidth($work->project_name, 0, 12, ".."); ?>
              <li class="project-{!! $work->id !!} 
                @if ($role_id == 2)
                  @if($logged_in_user == $work->project_manager) item-elements @else ignore-elements @endif
                @elseif($role_id == 3) @if(count($work->designer_project($work->id,$logged_in_user))) item-elements @else ignore-elements @endif
                @endif"
                data-pid="{!! $work->id !!}">
                <div class="panel">
                  <div class="panel-heading" style="background-color: {!! $work->projectmanager->color_code !!};">
                  @if($work->status == 'default')
                  @if ($role_id == 1 || $role_id == 2)
                  <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                    <h3 class="panel-title"><mark style="color: {{ $work->projectmanager->font_color }};">{!! $work->project_no.' '.$work->project_text !!}/{{  $add_dot_with_project_name }}</mark></h3>                             
                  </a>
                  @elseif($role_id == 3)
                  <h3 class="panel-title"><mark style="color: {{ $work->projectmanager->font_color }};">{!! $work->project_no.' '.$work->project_text !!}/{{  $add_dot_with_project_name }}</mark></h3>
                  @endif
                  @endif

                {{--   @if($work->status == 'studio-feedback')
                  <a href="{{route('clientFeedback',$work->id)}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                    <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>                                
                  </a>
                  <a href="{{route('reBrief',$work->id)}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                    <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>                             
                  </a>
                  @endif --}}
                </div>
              </div>
            </li>
            @endif
            @endforeach
            @endif
          </ul>
        </div>
      </div>

      <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">With Client</h3>
        </div>
        <div class="panel-body">
          <ul class="list-inline sort_list client_sortable_list" id="client_dropable" data-area="client">
              @if($studio_works)
              @foreach($studio_works as $work)
              @if($work->status == 'feedback')
              <?php $add_dot_with_project_name = mb_strimwidth($work->project_name, 0, 12, ".."); ?>
            <li class="project-{!! $work->id !!}
              @if ($role_id == 2)
                @if($logged_in_user == $work->project_manager) item-elements @else ignore-elements @endif
              @elseif($role_id == 3) @if(count($work->designer_project($work->id,$logged_in_user))) item-elements @else ignore-elements @endif
              @endif"
              data-pid="{!! $work->id !!}">
                <div class="panel">
                  <div class="panel-heading" style="background-color: {!! $work->projectmanager->color_code !!};">
                  @if ($role_id == 1 || $role_id == 2)
                  <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                    <mark style="color: {{ $work->projectmanager->font_color }};">{{  $work->project_no.' '.$work->project_text }}/{{  $add_dot_with_project_name }}</mark>
                  </a>
                  @elseif($role_id == 3)
                  <h3 class="panel-title" style="color: {{ $work->projectmanager->font_color }};">{!! $work->project_no.' '.$work->project_text !!}/{{  $add_dot_with_project_name }}</h3>
                  @endif
                </div>                                                
              </div>
            </li>
            @endif
            @endforeach
            @endif
          </ul>
        </div>
      </div><!-- /.panel -->

      <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Completed</h3>
        </div>
        <div class="panel-body">
          <ul class="list-inline sort_list client_sortable_list" id="client_dropable" data-area="client">
              @if($studio_works)
              @foreach($studio_works as $work)
              @if($work->status == 'completed')
              <?php $add_dot_with_project_name = mb_strimwidth($work->project_name, 0, 12, ".."); ?>
            <li class="project-{!! $work->id !!}
              @if ($role_id == 2)
                @if($logged_in_user == $work->project_manager) item-elements @else ignore-elements @endif
              @elseif($role_id == 3) @if(count($work->designer_project($work->id,$logged_in_user))) item-elements @else ignore-elements @endif
              @endif"
              data-pid="{!! $work->id !!}">
                <div class="panel">
                  <div class="panel-heading" style="background-color: {!! $work->projectmanager->color_code !!};">
                  @if ($role_id == 1 || $role_id == 2)
                  <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                    <mark style="color: {{ $work->projectmanager->font_color }};">{{  $work->project_no.' '.$work->project_text }}/{{  $add_dot_with_project_name }}</mark>
                  </a>
                  @elseif($role_id == 3)
                  <h3 class="panel-title" style="color: {{ $work->projectmanager->font_color }};">{!! $work->project_no.' '.$work->project_text !!}/{{  $add_dot_with_project_name }}</h3>
                  @endif
                </div>                                                
              </div>
            </li>
            @endif
            @endforeach
            @endif
          </ul>
        </div>
      </div><!-- /.panel -->

      
    </div>
  </div><!-- /.row -->

  
    <div class="dc-url" style="display: none">
      @if (Session::has('flash_message'))
        <p class="session-msg">{{ Session::pull('flash_message') }}</p>
      @endif
    </div>
</div>

@if ($role_id == 1 || $role_id == 2)
  <!-- brief modal -->
<div class="modal fade" id="briefModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- Re-Brief Modal -->
<div id="rebrModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
        <!-- sajjad -->
    </div>
  </div>
</div>
 <!-- Project-Status Modal -->
<div id="prstatusModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
   <div class="modal-content">
    <!-- <div class="modal-dialog modal-sm"> -->
        <!-- sajjad -->
    <!-- </div> -->
    </div>
  </div>
</div>

 <!-- Brief Edit Modal -->
<div id="briefEditModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <!-- <div class="modal-dialog modal-sm"> -->
        <!-- sajjad -->
    <!-- </div> -->
    </div>
  </div>
</div>
@endif

@if ($role_id == 3)
  <!-- Project-Status Modal -->
<div id="prstatusModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
   <div class="modal-content">
    <!-- <div class="modal-dialog modal-sm"> -->
        <!-- sajjad -->
    <!-- </div> -->
    </div>
  </div>
</div>
@endif

{!! Html::script('assetes/js/main.js') !!}
{!! Html::script('assetes/js/pm.js') !!}
{!! Html::script('assetes/js/refresh-page.js') !!}





