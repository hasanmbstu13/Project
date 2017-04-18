<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Brief</h4>
</div>
<div class="modal-body">

    <form action="" method="post" id = "brief-edit" enctype="multipart/form-data" class="form-horizontal">

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="project_no" class="col-sm-3 control-label">Project Number: </label>
            <div class="col-sm-2">
                {!! Form::text('project_no', $project->project_no,array('id'=>'project_no','class' => 'form-control','placeholder' => 'number','readonly' => 'readonly')) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::text('project_text', $project->project_text,array('id'=>'project_text','class' => 'form-control','placeholder' => 'text','readonly' => 'readonly')) !!}            
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Project Name: </label>
            <div class="col-sm-9">
                {!! Form::text('project_name', $project->project_name,array('id'=>'project_name','class' => 'form-control','placeholder' => 'name','readonly' => 'readonly')) !!}            
            </div>
        </div>

        <div class="form-group">
           <label for="leader_id" class="col-sm-3 control-label">Project Leader: </label>
           <div class="col-sm-6">
                {!! Form::select('project_leader',$group,$design_lead_id, ['class' => 'form-control','id'=>'project_leader','required' => 'required'])!!}
               @if ($errors->has('leader_id')) <p class="help-block">{{ $errors->first('leader_id') }}</p> @endif
           </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Group: </label>
            <div class="col-sm-9">
                {!! Form::select('group', $group,null, ['multiple' => 'multiple', 'name'=>'group[]','class' => 'form-control','id'=>'group','readonly' => 'readonly'])!!}
                @if ($errors->has('group')) <p class="help-block">{{ $errors->first('group') }}</p> @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-9 control-label">Number of hours spent on this project : <?php echo number_format($project->spent_hours,2); ?> hours</label> 
        </div>

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="task" name="task" placeholder="Task" value="{{ $brief->task }}">
            </div>
        </div>

        <?php $team_members = []; ?>
        @foreach ($group as $key => $team_member)
            <?php $team_members[] = $key; ?>
        @endforeach

        <div class="form-group">
            <label for="assigned_to" class="col-sm-3 control-label">Assign to: </label>
            <div class="col-sm-9">
                {!! Form::select('assigned_to', $designers,$brief->user_id, ['class' => 'form-control','id'=>'assigned_to','required' => 'required']) !!}
                
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Est. start Date: </label>
            <div class="col-sm-9">
                <div class='input-group date_picker est_date_picker' id="est_date_picker">
                    {!! Form::text('est_start_time', date("d-F-Y h:i", strtotime($brief->est_start_time)), array('id'=>'edit-br-est-deadline','class' => 'form-control date_picker', 'value' => '', 'placeholder' => '')) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Deadline: </label>
            <div class="col-sm-9">
                <div class='input-group date_picker br-edit-deadline' id="date_picker">
                    {!! Form::text('next_deadline', date("d-F-Y h:i", strtotime($brief->next_deadline)), array('id'=>'edit-br-brief_deadline','class' => 'form-control date_picker', 'placeholder' => "", 'required' => 'required', 'value' => '')) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="allocated_time" class="col-sm-3 control-label">Allocated time: </label>
            <div class="col-sm-3">
                <!-- <div class="form-group"> -->
                <select name="assigned_hour" class="form-control" id="allocated-time">
                    <option value="other">Other</option>
                    <?php for ($minute = 15; $minute <= 480; $minute += 15): ?>
                        <option value="<?=$minute?>" <?php if($minute == $brief->assigned_hour*60) echo "selected" ?>>
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
                    @if ($brief->assigned_hour*60 > 480)
                        <option value="<?=$brief->assigned_hour*60?>" <?php echo "selected" ?>>
                            <?php
                                $minute = $brief->assigned_hour*60; 
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
                    @endif
                </select>
            </div>
            <div id="other-option" class="col-sm-4">
                <div class="form-group">
                    
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="brief_no" class="col-sm-3 control-label">Brief number: </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="brief_no" name="brief_number" placeholder="Brief number" value="{{$brief->brief_number}}" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <a href="" class="btn btn-danger pull-right hide_modal">Cancel</a>               
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary" id="btn-brief-edit" data-url="{{route('editBrief',$brief->id)}}">Edit</button>
            </div>
        </div>
    </form>


</div>
<div class="loader">{{-- Place at bottom of page --}}</div>
{!! Html::script('assetes/js/main.js') !!}
{!! Html::script('assetes/js/projectStatusChange.js') !!}





