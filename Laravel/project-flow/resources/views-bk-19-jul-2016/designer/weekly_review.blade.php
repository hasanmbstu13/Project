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
		                    echo '<td>' . substr($mytime->format('l'),0,3) . '</td>';
		                }
		                $mytime->addDay();
		            }
		            ?>
		        </tr>
		    </thead>
		</table>
	</div>



	<div class="row bg-cal-row calender-list-here">
		<table class="table bg-date-row">
		    <tbody>
		    
		     
		    @foreach ($projects as $project)
		    <tr>
		        <?php

		        $mytime = Carbon\Carbon::now();

		        $start_date = new DateTime($mytime);
		        $since_start = $start_date->diff(new DateTime($project->deadline));
		        
		        if($since_start->d > 14){
		        	$days = 14;
		        } elseif($since_start->d<0) {
		        	$days = 14;
		        } else {
		        	$days = $since_start->d;
		        }
		        
		        for ($i = 0; $i < $days; $i++) {
		            if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
		            } else { ?>
		            <td height="100%" class="fc-day fc-widget-content fc-mon fc-past">
		                <ul class="weeks2-inline list-unstyled">
		                    <!--<li style="background-color: yellow">skylark123</li>-->
		                    <li style="background-color: {!! $project->color_code !!};">{!! $project->project_no.' '.$project->project_text !!}</li>
		                </ul>
		            </td>
		        <?php  } $mytime->addDay(); 
		        } ?>
		    </tr>
		    @endforeach
		    </tbody>
		</table>
	</div>

@stop

@section('footer-script')
{!! Html::script('assetes/js/designer.js') !!}
@endsection
