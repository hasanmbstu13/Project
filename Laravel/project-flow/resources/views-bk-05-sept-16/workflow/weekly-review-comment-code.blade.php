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
							<table class="table bg-date-row">
								<tbody>
									<tr>	
									@for ($i = 0; $i < $days; $i++)
										@if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun')							
										@else
											<?php $works = App\Work::where(['project_id'=>$project->project_id, 'status'=>'started'])->where('next_deadline','>=',$mytime)->get();  ?>																							    
												<td>
													<span style="background-color: {!! $project->color_code !!}">{!! $project->project_no.' '.$project->project_text !!}</span>
													<div class="designers">
														@if(count($works))
															@foreach ($works as $work)
																<span>{{ $work->user->nick_name}}</span>
															@endforeach
														@endif
													</div>
												</td>
										@endif 
										<?php $mytime->addDay(); ?> 
									@endfor
								</tr>
							</tbody>
					      </table>
						   @endif
						@endforeach
					
			</div>