@if (count($all_leaves)>0)
<div>
	<table class="table table-sm all-leaves-data">		
			<thead>
			  <tr>
			    <th>Name</th>
			    <th>Start Date</th>
			    <th>End Date</th>
			    <th>Number of Days</th>
			    <th>Approved By</th>
			    <th>Leave Type</th>
			    <th>Action</th>
			  </tr>
			</thead>
			<tbody>
			@foreach ($all_leaves as $leave)
			  <tr class="leave-data" align="center">
			    {{-- <th scope="row">1</th> --}}
			    {{-- User Fullname --}}
			    <?php $user = $leave->user()->first(); ?>
			    <td>@if($user){{$user->first_name.' '.$user->last_name}}@endif</td>
			    <td>{{date("D M d, g:iA", strtotime($leave->start_date))}}</td>
			    <td>{{date("D M d, g:iA", strtotime($leave->end_date))}}</td>
			    <td>{{$leave->number_of_days}}</td>
			    <?php $manager = $leave->manager()->first(); ?>
			    <td>@if($manager){{$manager->first_name.' '.$manager->last_name}}@endif</td>
			    <td>{{ucwords($leave->leave_type)}} Leave</td>			    
			    <td {{-- class="btn btn-danger" --}}><button data-url="{{route('removeLeave',$leave->id)}}" class="remove-a-leave btn-danger">Remove</button></td>	                                                     		    
			  </tr>
			@endforeach
			</tbody>
		{{-- @else
			<p class="no-leave">No leave information found for this user.</p> --}}		
	</table>
</div>
@endif