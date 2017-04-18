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

                                        {!! $user->nick_name !!}



                                        @foreach($user->work as $task)
                                                                <?php //var_dump($user); exit;?>
                                                                    @if($task->start_time <= $mytime && $task->next_deadline >= $mytime)
                                                                    <li style="background-color: {!! $task->project->projectmanager->color_code !!};">{!! $task->project->project_no.' '.$task->project->project_text !!}</li>
                                                                    @endif
                                                                @endforeach

                                                                    <li style="background-color: {!! $task->project->projectmanager->color_code !!};">{!! $task->project->project_no.' '.$task->project->project_text !!}</li>
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

                                        @if($task->start_time <= $mytime && $task->next_deadline >= $mytime)

                                        @endif













$results = DB::table('users')
            ->leftJoin('works', 'users.id', '=', 'works.user_id')
            ->leftJoin('projects', 'projects.id', '=', 'works.project_id')
            ->where('projects.status', '=', 'development')
             // AND 'works.status' in ('started', 'queued') )
            ->whereIn('works.status', array('started', 'queued'))
            ->select('users.id','users.nick_name', 'projects.id', 'projects.project_no', 'projects.project_text', 'works.status')
            //->orderBy('works.status', 'DESC')
            ->get();

// return $results;


$user_works = array();
$nick_name = 'fghiop';
$i=0;

foreach ($results as $work) {
    if($work->nick_name == $nick_name){
        $user_works[$work->nick_name]['status'][$i++]   = $work->status;
    }else {
        $user_works[$work->nick_name]['id']                         = $work->id;
        $user_works[$work->nick_name]['nick_name']                  = $work->nick_name;
        $user_works[$work->nick_name]['project_no']                 = $work->project_no;
        $user_works[$work->nick_name]['project_text']               = $work->project_text;
        $user_works[$work->nick_name]['status'][$i++]   = $work->status;
    }

    $nick_name = $work->nick_name;
   // $user_works[]
   // echo $work->id; exit;
}