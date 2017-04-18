<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Create Brief</h4>
</div>
<div class="modal-body">

    <form action="{{route('cleientBriefCreate',$id)}}" method="post" id = "client_brief" enctype="multipart/form-data" class="form-horizontal">

        {!! csrf_field() !!}


        <div class="form-group">
            <label for="project_no" class="col-sm-3 control-label">Project Number: </label>
            <div class="col-sm-2">
                {!! Form::text('project_no', $data['project']['project_no'],array('id'=>'project_no','class' => 'form-control','placeholder' => 'number','readonly' => 'readonly')) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::text('project_text', $data['project']['project_text'],array('id'=>'project_text','class' => 'form-control','placeholder' => 'text','readonly' => 'readonly')) !!}            
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Project Name: </label>
            <div class="col-sm-9">
                {!! Form::text('project_name', $data['project']['project_name'],array('id'=>'project_name','class' => 'form-control','placeholder' => 'name','readonly' => 'readonly')) !!}            
            </div>
        </div>

        <div class="form-group">
           <label for="leader_id" class="col-sm-3 control-label">Project Leader: </label>
           <div class="col-sm-6">
                {!! Form::select('project_leader',$data['group'],$data['leader_id'], ['class' => 'form-control','id'=>'project_leader','required' => 'required'])!!}
               @if ($errors->has('leader_id')) <p class="help-block">{{ $errors->first('leader_id') }}</p> @endif
           </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Group: </label>
            <div class="col-sm-9">
                {!! Form::select('group', $data['group'],null, ['multiple' => 'multiple', 'name'=>'group[]','class' => 'form-control','id'=>'group','readonly' => 'readonly'])!!}
                @if ($errors->has('group')) <p class="help-block">{{ $errors->first('group') }}</p> @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-8 control-label">Number of hours spent on this project : @if(isset($data['works_brief']['0']->used_hour)) {{ $data['works_brief']['0']->used_hour }} @else {{ 0 }} @endif hours</label> 
        </div>

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="task" name="task" placeholder="Task" value="">
            </div>
        </div>

        <div class="form-group">
            <label for="assigned_to" class="col-sm-3 control-label">Assign to: </label>
            <div class="col-sm-9">
                {!! Form::select('group', $group,$leader_list, ['multiple' => 'multiple', 'name'=>'assigned_to[]','class' => 'form-control jsSelect2','id'=>'assigned_to','required' => 'required'])!!}
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Deadline: </label>
            <div class="col-sm-9">
                <div class='input-group date_picker' id="date_picker">
                    {!! Form::text('next_deadline', null, array('id'=>'deadline','class' => 'form-control date_picker', 'placeholder' => "10-May-2016 10:00 AM")) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="allocated_time" class="col-sm-3 control-label">Allocated time: </label>
            <div class="col-sm-3 form-group">
                <input type="text" class="form-control" id="allocated_time" name="assigned_hour" placeholder="Allocated time" value="">hrs
            </div>

            <label for="brief_no" class="col-sm-3 control-label">Brief number: </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="brief_no" name="brief_number" placeholder="Brief number" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <a href="" class="btn btn-default pull-right hide_modal">Cancel</a>               
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="btn-save" value="add">Create</button>
            </div>
        </div>
    </form>
    {!! Html::script('assetes/js/pm.js') !!}
</div>



