@extends('layouts.jobs')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row flow-heading">
                            <div class="col-md-2">
                                <h4>Name</h4>
                                <?php //var_dump($user_works); ?>
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="row"><h5 class="text-center">2weeks workflow</h5></div> -->
                                <div class="row"><h5 class="text-center">Work</h5></div>
                                 <!-- <div class="row">
                                    <table class="table cal-header">
                                        <thead>
                                        <tr>
                                            <?php
                                            // $mytime = Carbon\Carbon::now();
                                            // for ($i = 0; $i < 14; $i++) {
                                            //     if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
                                            //     } else {
                                            //         echo '<td>' . $mytime->format('d') . '</td>';
                                            //     }
                                            //     $mytime->addDay();
                                            // }
                                            ?>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>  -->
                            </div>
                            <div class="col-md-6">
                                <div class="row"><h5 class="text-center">Queue</h5></div>
                            </div>
                        </div>

                        @if($users)
                            @foreach($users as $user)
                            @if ($user->work)
                                {{-- expr --}}
                            
                            <?php //var_dump($user); exit;//echo $user->nick_name; exit; ?>
                                <div class="row working-data-row">
                                    <div class="col-md-2">
                                        {!! $user->nick_name !!}
                                         <?php //echo $user->work; var_dump($user->work['next_deadline']);//exit; ?>
                                         <?php //var_dump($user->work['next_deadline']);//exit; ?>
                                         <?php //var_dump($user->project['id']);//exit; ?>
                                        <button class="popper" data-toggle="popover"><span
                                                    class="glyphicon glyphicon-forward"></span></button>
                                        <!-- <div class="popper-content hide">
                                            <h5 class="pop-heading">I am the leader of this projects.</h5>
                                            @if($user->leader)
                                                <ul>
                                                    @foreach($user->leader as $leader)
                                                        <li>{!! $leader->project_no.' '.$leader->project_text !!}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div> -->
                                    </div>

                                    <div class="col-md-10 calender-list-here">
                                        <div class="row bg-cal-row">
                                            <table class="table bg-date-row">
                                                <tbody>
                                                <tr>
                                                    <?php
                                                    $mytime = Carbon\Carbon::now();
                                                    for ($i = 0; $i < 14; $i++) {
                                                        if ($mytime->format('D') == 'Sat' || $mytime->format('D') == 'Sun') {
                                                        } else { ?>
                                                        <td height="100%" class="fc-day fc-widget-content fc-mon fc-past">
                                                            <ul class="weeks2-inline list-unstyled">
                                                                    <?php $previous_value = 'previous_value'; ?>

                                                                @foreach($user->calworks as $task)
                                                                <?php //var_dump($user->calworks->t); exit;?>
                                                                    <!-- if($task->start_time <= $mytime && $task->next_deadline >= $mytime) -->
                                                                    
                                                                    @if($task->status=='devlopment')
                                                                    @if ($task->project->project_text != $previous_value)
                                                                        {{-- expr --}}
                                                                            <?php $previous_value = $task->project->project_text ?>
                                                                            <?php //var_dump($previous_value); ?>
                                                                    <li style="background-color: {!! $task->project->projectmanager->color_code !!};">{!! $task->project->project_no.' '.$task->project->project_text !!}</li>
                                                                    @endif
                                                                 @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    <?php  } $mytime->addDay(); } ?>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                @endif
                            @endforeach
                        @endif


                    </div>

                </div>

            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">With Studio</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-inline sort_list studio_sortable_list" id="queue_dropable"
                                    data-area="studio">
                                    @if($studio_works)
                                        @foreach($studio_works as $work)
                                            @if($work->status == 'development')
                                                <li class="project-{!! $work->id !!}"
                                                    data-pid="{!! $work->id !!}">
                                                    <div class="panel">
                                                        <div class="panel-heading"
                                                             style="background-color: {!! $work->projectmanager->color_code !!};">
                                                            <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <a href="{{route('review',$work->id)}}" class="brief_this" data-toggle="modal" data-target="#briefModal" data-remote="false">Review</a>

                                                        </div>
                                                    </div>

                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">With Client Service</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-inline sort_list client_sortable_list" id="client_dropable"
                                    data-area="client">
                                    @if($studio_works)
                                        @foreach($studio_works as $work)
                                            @if($work->status == 'default' || $work->status == 'studio-feedback')
                                                <li class="project-{!! $work->id !!}"
                                                    data-pid="{!! $work->id !!}">
                                                    <div class="panel">
                                                        <div class="panel-heading"
                                                             style="background-color: {!! $work->projectmanager->color_code !!};">
                                                            <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">With Client</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-inline sort_list client_sortable_list" id="client_dropable"
                                    data-area="client">
                                    @if($studio_works)
                                        @foreach($studio_works as $work)
                                            @if($work->status == 'client-feedback')
                                                <li class="project-{!! $work->id !!}"
                                                    data-pid="{!! $work->id !!}">
                                                    <div class="panel">
                                                        <div class="panel-heading"
                                                             style="background-color: {!! $work->projectmanager->color_code !!};">
                                                            <h3 class="panel-title">{!! $work->project_no.' '.$work->project_text !!}</h3>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brief modal -->
    <!-- Default bootstrap modal example -->
    <div class="modal fade" id="briefModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
    {!! Html::script('assetes/js/designer.js') !!}
@endsection

