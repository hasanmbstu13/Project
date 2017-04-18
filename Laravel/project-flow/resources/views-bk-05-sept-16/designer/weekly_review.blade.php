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
		    <?php   //date_default_timezone_set('Europe/Berlin'); ?>
		        <?php
		        // var_dump(date($project->deadline)); 

		        $mytime = Carbon\Carbon::now();

		        $start_date = new DateTime($mytime);
		        $since_start = $start_date->diff(new DateTime($project->deadline));
		        // echo $since_start->days.' days total<br>';
		        // echo $since_start->y.' years<br>';
		        // echo $since_start->m.' months<br>';
		        // echo $since_start->d.' days<br>';
		        // echo $since_start->h.' hours<br>';
		        // echo $since_start->i.' minutes<br>';
		        // echo $since_start->s.' seconds<br>';

		        // exit;
		        // // var_dump($mytime); 
		        // // exit;
		        // // $now->format('Y-m-d H:i');
		        // // var_dump($now->format('Y-m-d H:i:s'));
		        // // $mytime = date();
		        // // $current_date = strtotime($mytime);
		        // // $current_date = strtotime($mytime->format('Y-m-d'));
		        // // echo "<br>";
		        // // echo "<br>";
		        // // echo "<br>";
		        // // var_dump($project->deadline);
		        // // $project_deadline = date('Y-m-d',$project->deadline);
		        // // $project_deadline = strtotime($project->deadline);
		        //  $current_date = strtotime($mytime);
		        //  $current_date = date("Y-m-d", $current_date);
		        //  $project_deadline = strtotime($project->deadline);
		        //  $project_deadline = date("Y-m-d", $project_deadline);  
		        //  // $project_deadline = strtotime($project_deadline);                 
		        // // $days=date_diff(date_create($project->deadline),date_create($mytime));

		        // $secs = strtotime($project_deadline) - strtotime($current_date);
		        // $days = (integer)($secs / 86400);
		        // var_dump($since_start->d);
		        if($since_start->d > 14){
		        	$days = 14;
		        } elseif($since_start->d<0) {
		        	$days = 14;
		        } else {
		        	$days = $since_start->d;
		        }
		        // echo "<br>";
		        // echo "<br>";
		        // echo "<br>After Modified";
		        // var_dump($days);

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
