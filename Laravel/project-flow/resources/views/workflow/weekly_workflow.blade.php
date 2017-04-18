<div class="row">
	@if (count($users))
	<table class="table table-bordered table-all-workflow">
		<thead>
			<tr>
				<th>Designer</th>
				<?php
				$mytime = Carbon\Carbon::now();
				for ($i = 0; $i < 14; $i++) {
					if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
					} else {
						echo '<th>' . substr($mytime->format('l'),0,3).'/'.$mytime->format('d').'</th>';
					}
					$mytime->addDay();
				}
				?>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr align="center">
				<td>{{ $user->nick_name }}</td>
				<?php
				$mytime = Carbon\Carbon::now();
				for ($i = 0; $i < 14; $i++) {
					if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
					} else {
						$works = $user->works($mytime)->get();
						$output = '';
						if (count($works)){				        			
							foreach ($works as $work)
								$output .= '<span class="pro" style="background-color:'.$work->project->projectmanager->color_code .';color:'.$work->project->projectmanager->font_color.'">'.$work->project->project_no.' '.$work->project->project_text.'</span>';
						}
						echo '<td>';
						if ($output)
							echo $output; 
						echo '</td>';					        	
					}
					$mytime->addDay();
				}
				?>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>	

{!! Html::script('assetes/js/workflow.js') !!}	
