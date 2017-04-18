@extends('layouts.jobs')
@section('content')
		<div class="row flow-heading">
			<table class="table cal-header">
				<thead>
					<tr>
						<?php
						$mytime = Carbon\Carbon::now();
						for ($i = 0; $i < 14; $i++) {
							if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
							} else {
								echo '<td>' . substr($mytime->format('l'),0,3).'/'.$mytime->format('d').'</td>';
							}
							$mytime->addDay();
						}
						?>
					</tr>
				</thead>
			</table>
		</div>


		<div class="row bg-cal-row calender-list-here">
			
					<?php 
						// $mytime = Carbon\Carbon::now();
						// $today_dt = new DateTime($mytime);
					?>
					@foreach ($projects as $project)
							<?php 	
								$mytime = Carbon\Carbon::now();
								$today_dt = new DateTime($mytime);					
								$project_dt = new DateTime($project->deadline);
							?>
						@if ($project_dt > $today_dt)
								<?php 
									$seconds =  strtotime($project->deadline) - strtotime($mytime);
									$days    = floor($seconds / 86400);

									if($days > 14)
										$days = 14; 

									if($seconds<86400)
										$days = 1;
								?>
							{{-- <table class="table bg-date-row">
								<tbody>
									<tr> --}}	
									<br>
									@for ($i = 0; $i < $days; $i++)
										@if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun')							
										@else
											{{-- <div style="background-color: {!! $project->color_code !!};"> --}}
												<span style="background-color: {!! $project->color_code !!}; margin-left:40px; margin-right:40px">{!! $project->project_no.' '.$project->project_text !!}</span>
											{{-- </div> --}}
											{{-- <td>
												<ul class="weeks2-inline list-unstyled">
													<li style="background-color: {!! $project->color_code !!};">{!! $project->project_no.' '.$project->project_text !!}</li>
												</ul>
											</td> --}}
										@endif 
										<?php $mytime->addDay(); ?> 
									@endfor
								<br>
								{{-- </tr>
							</tbody>
					      </table> --}}
						   @endif
						@endforeach
					
			</div>
@stop
@section('footer-script')
{!! Html::script('assetes/js/designer.js') !!}
@endsection
