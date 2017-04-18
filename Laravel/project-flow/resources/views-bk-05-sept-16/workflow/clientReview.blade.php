<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">{{ $data['project']['project_no'] }} {{ $data['project']['project_text'] }}</h4>
</div>
<div class="modal-body">
    <form action="{{route('clientReview/edit',$id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">


        {!! csrf_field() !!}

        {{ method_field('PATCH') }}

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
            <label for="project_name" class="col-sm-3 control-label">Project Leader: </label>
            <div class="col-sm-9">
                {!! Form::text('leader_name', $data['leader_name'],array('id'=>'leader_name','class' => 'form-control','placeholder' => 'name','readonly' => 'readonly')) !!}            
                @if ($errors->has('leader_name')) <p class="help-block">{{ $errors->first('leader_name') }}</p> @endif
            </div>
        </div>
        
        
        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Group: </label>
            <div class="col-sm-9">
                {!! Form::select('group', $group, null, ['multiple' => 'multiple', 'name'=>'group[]','class' => 'form-control','id'=>'group','required' => 'required','readonly' => 'readonly'])!!}
                @if ($errors->has('group')) <p class="help-block">{{ $errors->first('group') }}</p> @endif
            </div>
        </div>
        
        @if ($role_id == 1 || $role_id == 2)       
            <div class="form-group">  
                @if ($role_id == 2 || $role_id == 3)
                @endif  
                <a href="{{route('clientBrief',$id)}}" class="brief_this btn btn-default" id="brief_this" data-toggle="modal" data-target="#rebrModal" data-remote="false">Brief</a>
                @if ($work_status != 'feedback') 
                    <a href="{{route('toClient', $id)}}" class="btn btn-default" id="to_client">To Client</a>
                @endif
                <a href="{{ route('toArchive', $id) }}" class="btn btn-default project_archive" id="project_archive">Archive</a>
            </div>
        @endif
</form>
<div class="loader"><!-- Place at bottom of page --></div>
{!! Html::script('assetes/js/archive.js') !!}
</div>
