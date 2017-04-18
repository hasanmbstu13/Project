<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Client Feedback</h4>
</div>
<div class="modal-body">
    <form action="{{route('clientFeedback',$id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Details: </label>

            <div class="col-sm-9">
                {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control'))!!}
                @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
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