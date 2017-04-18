<div class="row main-content new-content">
    
    <div class="col-md-10">
       <div class="row">
           <div class="col-md-12">
               <div class="row flow-heading">
                   <div class="col-md-2">
                       <h4>Name</h4>
                   </div>
                   <div class="col-md-4">
                       <!-- <div class="row"><h5 class="text-center">2weeks workflow</h5></div> -->
                       <div class="row"><h5 class="text-center">Work</h5></div>
                       <div class="row">
                           <table class="table cal-header">
                               <thead>
                                   <tr>
                                       <?php
                                       // $mytime = Carbon\Carbon::now();
                                       // for ($i = 0; $i < 14; $i++) {
                                       //     if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
                                       //     } else {
                                       //         echo '<td>' . $mytime->format('d') . '</td>';
                                       //     }
                                       //     $mytime->addDay();
                                       // }
                                       ?>
                                   </tr>
                               </thead>
                           </table>
                       </div>                                
                   </div>
                   <div class="col-md-6">
                       <div class="row"><h5 class="text-center">Queue</h5></div>
                   </div>
               </div>

               @if($user_works)
               @foreach($user_works as $user)
               <div class="row working-data-row">
                   <div class="col-md-2">
                       {!! $user['nick_name'] !!}
                       <button class="popper project-content" data-toggle="popover"><span
                           class="glyphicon glyphicon-forward project-content"></span>
                           <div class="leader-url" style="display:none">
                             <p>{{route('project_leader',$user['user_id'])}}</p>
                           </div>
                        </button>
  
                        <div class="popper-content hide">
                            <h5 class="pop-heading">I am the leader of this projects. <span class="glyphicon glyphicon-remove"></span></h5>
                            <div class="project-content">
                              
                            </div>
                            {{-- @if(!empty($user['leader_of_projects'])) --}}
                                <!-- <ul> -->
                                    {{-- @foreach($user['leader_of_projects'] as $project_leader) --}}
                                        {{-- <li>{{ $project_leader->project_no.' '.$project_leader->project_text !!}</li> --}}
                                    {{-- @endforeach --}}
                                <!-- </ul> -->
                            {{-- @endif --}}
                        </div>

                       </div>

                       <div class="col-md-10 calender-list-here">
                           <div class="row bg-cal-row">
                               <table class="table bg-date-row">
                                   <tbody>
                                       <tr>
                                           <td height="100%" class="fc-day fc-widget-content fc-mon fc-past">
                                              @foreach($user['project'] as $project)
                                                  @if ($project['status'] == 'started')
                                                    <a href="{{route('briefProjectStatus',array('project_id' => $project['project_id'],'user_id'=>$user['user_id'], 'status'=>'started'))}}" class="brief_this" data-toggle="modal" data-target="#prstatusModal" data-remote="false"> 
                                                       <mark style="background-color: {{ $project['color_code'] }}; margin: 10px"> {!! $project['project_no'].$project['project_text'] !!} </mark>
                                                    </a>
                                                  @endif
                                              @endforeach
                                          </td>

                                          <td height="100%" class="fc-day fc-widget-content fc-mon fc-past">
                                              @foreach($user['project'] as $project)
                                                  @if ($project['status'] == 'queued')
                                                    <a href="{{route('briefProjectStatus',array('project_id' => $project['project_id'],'user_id'=>$user['user_id'],'status'=>'queued'))}}" class="brief_this" data-toggle="modal" data-target="#prstatusModal" data-remote="false"> 
                                                       <mark style="background-color: {{ $project['color_code'] }}; margin: 10px"> {!! $project['project_no'].$project['project_text'] !!} </mark>
                                                    </a>
                                                  @endif
                                              @endforeach
                                          </td>

                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>

                  </div>

                  @endforeach
                  @endif


              </div>

          </div>

    </div>
    <div class="col-md-2">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">With Studio</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-inline sort_list studio_sortable_list" id="queue_dropable"
                            data-area="studio">
                            @if($studio_works)
                                @foreach($studio_works as $work)
                                    @if($work->status == 'development')
                                        <li class="project-{!! $work->id !!}
                                        @if($tl_id != $work->project_manager) ignore-elements @else item-elements @endif"
                                            data-pid="{!! $work->id !!}">
                                            <div class="panel">
                                                <div class="panel-heading"
                                                     style="background-color: {!! $work->projectmanager->color_code !!};">
                                                    <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                                                        <mark>{{  $work->project_no.' '.$work->project_text }}</mark>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">With Client Service</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-inline sort_list client_sortable_list" id="client_dropable"
                            data-area="client">
                            @if($studio_works)
                                @foreach($studio_works as $work)
                                    @if($work->status == 'default' || $work->status == 'studio-feedback')
                                        <li class="project-{!! $work->id !!}
                                        @if($tl_id != $work->project_manager) ignore-elements @else item-elements @endif"
                                            data-pid="{!! $work->id !!}">
                                            <div class="panel">
                                                <div class="panel-heading"
                                                     style="background-color: {!! $work->projectmanager->color_code !!};">
                                                     @if($work->status == 'default')
                                                         <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                                                            <h3 class="panel-title"><mark>{!! $work->project_no.' '.$work->project_text !!}</mark></h3>                             
                                                         </a>
                                                     @endif

                                                     @if($work->status == 'studio-feedback')
                                                         <a href="{{route('clientFeedback',$work->id)}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                                                            <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>                                
                                                         </a>
                                                         <a href="{{route('reBrief',$work->id)}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">
                                                            <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>                             
                                                         </a>
                                                     @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Client</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-inline sort_list client_sortable_list" id="client_dropable"
                            data-area="client">
                            @if($studio_works)
                                @foreach($studio_works as $work)
                                    @if($work->status == 'feedback')
                                        <li class="project-{!! $work->id !!}
                                        @if($tl_id != $work->project_manager) ignore-elements @else item-elements @endif"
                                            data-pid="{!! $work->id !!}">
                                            <div class="panel">
                                                <div class="panel-heading"
                                                     style="background-color: {!! $work->projectmanager->color_code !!};">
                                                    <a href="{{route('clientReview',array('work_id' => $work->id, 'work_status' => $work->status))}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">                                                    
                                                        <mark>{{  $work->project_no.' '.$work->project_text }}</mark>
                                                    </a>
                                                </div>                                                
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dc-url" style="display: none">
      <h2>{{ $url }}</h2>
      @if (Session::has('flash_message'))
        <p class="session-msg">{{ Session::pull('flash_message') }}</p>
      @endif
    </div>
</div>

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


{!! Html::script('assetes/js/pm.js') !!}

