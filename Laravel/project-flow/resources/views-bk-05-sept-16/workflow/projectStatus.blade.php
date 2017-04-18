<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">{{ $work_status->project->project_no }} {{ $work_status->project->project_text }}</h4>
</div>
<div class="modal-body">
    <form action="{{ route('workLogStore', array('id'=>$work_status->id, 'project_id' => $work_status->project_id,'user_id'=>$work_status->user_id)) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="designer-form">
        
        
        {!! csrf_field() !!}

        <h4>Brief Number: {{ $work_status->brief_number }}</h4>
        
        <div class="form-group">
            <?php
                $assigned_hours = $work_status->assigned_hour*60;
            ?>
            <label class="col-sm-5 control-label">Allocated Time is: </label>
            <label class="col-sm-7 control-label">{{ (int)($assigned_hours/60) }} Hours {{ $assigned_hours%60 }} Minutes</label>
        </div>

        <div class="form-group">
            <?php
                $assigned_hours = $work_status->assigned_hour*60;
                $used_hours     = $work_status->used_hour*60;
                $remaining_hours = $assigned_hours - $used_hours;
            ?>
            <label class="col-sm-5 control-label">Time Remaining: </label> 
            <label class="col-sm-7 control-label"> @if ($remaining_hours < 0) {{"Time Over"}} @else {{ (int)($remaining_hours/60) }}:{{ $remaining_hours%60 }} @endif</label> 
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
        <div class="form-group log-hour">
            <label for="log_hour" class="col-sm-5 control-label">Log Hour: </label>
            <div class="col-sm-7">
                <select name="log_hour" class="form-control" id="log-hour">
                    <?php for ($minute = 15; $minute <= 480; $minute += 15): ?>
                        <option value="<?=$minute?>" <?php if($minute == 15) echo "selected" ?>>
                            <?php 
                                if($minute<60) 
                                    echo $minute.' Mins'; 
                                else
                                    if((int)($minute%60) != 0)
                                        if((int)($minute/60) == 1)
                                             echo (int)($minute/60).' Hr '.(int)($minute%60).' Mins';
                                         else 
                                            echo (int)($minute/60).' Hrs '.(int)($minute%60).' Mins';
                                    else
                                        if((int)($minute/60) == 1)
                                             echo (int)($minute/60).' Hour ';
                                        else
                                            echo (int)($minute/60).' Hours '; 
                            ?> 
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="error-msg">
                
            </div>
        </div>
        @endif
        
        

        @if ((($user_role_id == 3) && ($authenticate_user == 1)) || (($user_role_id == 3) && ($work_status->status != 'started')))
        
        <div class="form-group" style="margin: 20px auto; text-align: center;">
        <div class="col-sm-12">

            <button style="margin-right:5px;" data-url ="{{ route('projectStatusChange',array('id'=>$work_status->id,'project_id' => $work_status->project_id,'user_id'=>$work_status->user_id, 'brief_number' =>$work_status->brief_number)) }}"
                @if ($work_status->status == 'started'){{ "disabled" }} @endif
                id="task-start" class="btn btn-default">                  
                <span class="glyphicon glyphicon-menu-right"></span> <span class="glyphicon glyphicon-menu-right"></span><br>Start
            </button>
           
            <button style="margin-right:5px;" type="button" name="task_paused" id ="task-pause" class="btn btn-default" @if ($work_status->status == 'queued'){{ "disabled" }} @endif >
                <span class="glyphicon glyphicon-pause"></span><br>Pause
            </button>

            @if ($work_status->status == 'started')
            <button type="button" class="btn btn-default" id="task-done" data-url="{{ route('toProjectDone',array('id'=>$work_status->id,'project_id' => $work_status->project_id,'user_id'=>$work_status->user_id, 'brief_number' => $work_status->brief_number)) }}">
                <span class="glyphicon glyphicon-off"></span><br>Done
            </button>
            @endif
        </div>
        </div>
        @elseif($work_status->status = 'started' && $user_role_id == 3)
            <div class="form-group" style="margin: 20px auto; text-align: center;">
            <div class="col-sm-12">
                <button style="margin-right:5px;" data-url ="{{ route('projectStatusChange',array('id'=>$work_status->id,'project_id' => $work_status->project_id,'user_id'=>$work_status->user_id, 'brief_number' =>$work_status->brief_number)) }}"
                    id="task-start" class="btn btn-default">                  
                    <span class="glyphicon glyphicon-menu-right"></span> <span class="glyphicon glyphicon-menu-right"></span><br>Start
                </button>
            </div>
            </div>
        @endif
    </form>
</div>
<div class="loader"><!-- Place at bottom of page --></div>

{!! Html::script('assetes/js/projectStatusChange.js') !!}


