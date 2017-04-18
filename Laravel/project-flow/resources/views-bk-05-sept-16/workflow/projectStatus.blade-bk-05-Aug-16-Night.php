<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">{{ $work_status->project->project_no }} {{ $work_status->project->project_text }}</h4>
</div>
<div class="modal-body">
    <form action="{{ route('workLogStore', array('project_id' => $work_status->project_id,'user_id'=>$work_status->user_id)) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="task_pause">
        
        
        {!! csrf_field() !!}

        <h4>Brief Number: {{ $work_status->brief_number }}</h4>
        
        <div class="form-group">
            <?php
                $assn_minutes = (int)$work_status->assigned_hour*60 + ($work_status->assigned_hour - floor($work_status->assigned_hour))*100;
            ?>
            <label class="col-sm-5 control-label">Allocated Time is: </label>
            <label class="col-sm-7 control-label">{{ (int)($assn_minutes/60) }} Hours {{ $assn_minutes%60 }} Minutes</label>
        </div>

        <div class="form-group">
            <?php
                $used_minutes = (int)$work_status->used_hour*60 + ($work_status->used_hour - floor($work_status->used_hour))*100;
                $remaining_mins = $assn_minutes - $used_minutes;
            ?>
            <label class="col-sm-5 control-label">Time Remaining: </label> 
            <label class="col-sm-7 control-label"> @if ($remaining_mins < 0) {{"Time Over"}} @else {{ (int)($remaining_mins/60) }}:{{ $remaining_mins%60 }} @endif</label> 
        </div>

        @if (($work_status->status == 'queued'))
        <div class="form-group">
            <label for="est_start_time" class="col-sm-5 control-label">Est. Start Date: </label>
            <label class="col-sm-7 control-label" id="est_start_time">{{ date("D M d", strtotime($work_status->est_start_time)) }}</label>
        </div>
        @endif
        
        <div class="form-group" style="margin-bottom: 10px;">
            <label class="col-sm-5 control-label">Deadline: </label> 
            <label class="col-sm-7 control-label">{{ date("D M d", strtotime($work_status->next_deadline)) }}</label>
        </div>

        @if (($user_role_id == 3) && ($work_status->status == 'started') && ($authenticate_user == 1))
        <div class="form-group">
            <label for="log_hour" class="col-sm-5 control-label">Log Hour: </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="log_hour" name="log_hour" placeholder="Log hour" value="" required="required">
            </div>
        </div>
        @endif
        
        {{-- @if (($user_role_id == 3)) --}}
        @if ((($user_role_id == 3) && ($authenticate_user == 1)) || (($user_role_id == 3) && ($work_status->status != 'started')))

        <div class="form-group" style="margin: 20px auto; text-align: center;">
        <div class="col-sm-12">
            {{-- <button type="button" name = "brief" class="btn btn-default" 
                @if ($work_status->status == 'started')
                    {{"disabled"}}
                @endif >    --}}            
                
            <a style="margin-right:5px;" href="{{ route('projectStatusChange',array('project_id' => $work_status->project_id,'user_id'=>$work_status->user_id, 'brief_number' =>$work_status->brief_number)) }}"
                <?php if ($work_status->status == 'started') {
                    echo "onclick = \"return false\""; echo "style = \"pointer-events: none\"";
                }
               ?>
            id="task_started" class="btn btn-default"> 
         
            
            <span class="glyphicon glyphicon-menu-right" style="margin-right:-10px"></span> <span class="glyphicon glyphicon-menu-right" style="margin-right:5px;"></span>
            
            Start</a>

            {{-- </button> --}}
            
            <button style="margin-right:5px;" type="submit" name = "task_paused" class="btn btn-default" 
                @if ($work_status->status == 'queued')
                    {{"disabled"}}
                @endif>
            <span class="glyphicon glyphicon-pause"></span>
            Pause</button>
            @if ($work_status->status == 'started')
             {{-- <button type="submit" name = "task_done" class="btn btn-default"> --}}
                <a href="{{ route('toProjectDone',array('project_id' => $work_status->project_id,'user_id'=>$work_status->user_id, 'brief_number' => $work_status->brief_number)) }}" id="task_done" class="btn btn-default"><span class="glyphicon glyphicon-off" style="margin-right: 8px;"></span>Done</a>
             {{-- </button> --}}
            @endif
        </div>
        </div>
        @endif
    </form>
</div>

{!! Html::script('assetes/js/projectStatusChange.js') !!}


