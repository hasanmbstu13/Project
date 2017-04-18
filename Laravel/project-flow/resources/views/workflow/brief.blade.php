<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Brief</h4>
</div>
<div class="modal-body">
    <form action="{{route('brief',$id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Project Leader: </label>
            <div class="col-sm-9">
                {!! Form::select('leader_id', $leader_options, null, ['class' => 'form-control','id'=>'leader_id','required' => 'required'])!!}
                @if ($errors->has('leader_id')) <p class="help-block">{{ $errors->first('leader_id') }}</p> @endif
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Group: </label>
            <div class="col-sm-9">
                {!! Form::select('group', $leader_options, null, ['multiple'=>'multiple','name'=>'group[]','class' => 'form-control jsSelect2','id'=>'group','required' => 'required'])!!}
                @if ($errors->has('group')) <p class="help-block">{{ $errors->first('group') }}</p> @endif
            </div>
        </div>

        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Start Time: </label>
            <div class="col-sm-9">
                <div class='input-group date_picker'>
                    {!! Form::text('start_time', Input::old('deadline'), array('id'=>'start_time','class' => 'form-control','required' => 'required')) !!}
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                </div>
                @if ($errors->has('start_time')) <p class="help-block">{{ $errors->first('start_time') }}</p> @endif
            </div>
        </div>
        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Dealine: </label>
            <div class="col-sm-9">
                <div class='input-group date_picker'>
                    {!! Form::text('next_deadline', Input::old('next_deadline'), array('id'=>'next_deadline','class' => 'form-control','required' => 'required')) !!}
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                </div>
                @if ($errors->has('next_deadline')) <p class="help-block">{{ $errors->first('next_deadline') }}</p> @endif
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile" class="control-label col-sm-3">Attachment</label>
            <input name="attachment" type="file" id="exampleInputFile" class="col-sm-9">
            <p class="help-block">Upload Attachment</p>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>
</div>


<script>
    $(function () {
        $(".jsSelect2").select2();
        // date time picker
        $('.date_picker').datetimepicker({
            // viewMode: 'years',
            format: 'DD-MMMM-YYYY'
        });


    });
</script>