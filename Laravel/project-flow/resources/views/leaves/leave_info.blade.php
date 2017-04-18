<div class="leave-info">
<div class="load-leave-form show-saved-leave">  
</div>
  <div class="leave-btn-group">
    <button type="button" class="btn btn-primary btn-add-leave-form" data-url="{{route('addLeaveForm',$user->id)}}">Add Leave</button>
    <button type="button" class="btn btn-primary btn-show-leave-info" data-url="{{route('showLeaveInfo',$user->id)}}">Show Leaves</button>
    <a href="{!! route('leaveInfoExport',$user->id) !!}" class="btn btn-success" role="button"><i class="glyphicon glyphicon-save-file"></i>Export Leave Data</a>
  </div>
</div>  

