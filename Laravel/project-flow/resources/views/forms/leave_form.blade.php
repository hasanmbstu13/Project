  <h3>Leave Info</h3>
  {!! Form::open(['url' => '','class' => 'leave-info-form leave-form','name'=>'leave_info']) !!}
  <div class="form-group">
    <label for="start_date">Start Date</label>
    <div class='input-group start-date date-time' id="starting-date">
      <input type="text" name="start_date" id="start-date" value=""  class="form-control date_picker leave-start-date leave-curr-date" required>           
      <span class="input-group-addon leave-input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <p class="error"></p>
  </div>

  <div class="form-group">
    <label for="ending-date" class="control-label">End Date</label>
    <div class='input-group end-date date-time' id="ending-date">
      <input type="text" name="end_date" value=""  id="end-date" class="form-control date_picker leave-end-date leave-curr-date" required>
      <span class="input-group-addon leave-input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <p class="error"></p>
  </div>

  <div class="form-group">
    <label for="number-of-days">Number of Days</label>
    <input type="text" id ="number-of-days" name="number_of_days" value="" class="form-control number-of-days" required="required">
    <p class="error"></p>
  </div>

  <div class="form-group">
    <label for="leave_type">Leave Type</label>
    <select name="leave_type" class="form-control leave-type" id="leave-type" required="required">
      <option value="">Select</option>
      <option value="annual">Annual Leave</option>
      <option value="sick">Sick Leave</option>
    </select>
    <p class="error"></p>
  </div>

  <div class="form-group">
    <button type="button" class="btn btn-primary btn-leave-Info" data-url="{{route('leaveInfo',$user_id)}}">Save</button>    
 </div>  
 <script type="text/javascript">
   // $('.start-date').datetimepicker({
   //   format: 'DD-MMMM-YYYY HH:mm'
   // });

   // $('.end-date').datetimepicker({
   //   format: 'DD-MMMM-YYYY HH:mm'
   // });
 </script>         
</form>