<?php

namespace App\Http\Controllers;

use \DB;
use App\Project;
use App\User;
use App\Work;
use App\WorkLog;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DesignerWorkFlowController extends Controller
{

    public function __construct()
    {
        $this->middleware('designer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
        ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
        ->where('roles.slug', '=','designer')
        ->select(
            'users.id as id',
            'users.nick_name',
            'users.first_name',
            'users.last_name',
            'users.email'
            )
            //->with('works')
        ->get();

        // get all works from studio
        $studio_works = Project::all();
        $data = [
        'users'         => $users,
        'studio_works'  => $studio_works,
        'dg_id'         => Sentinel::getUser()->id
        ];

        return view('designer.index',$data);
    }

    public function worksStatusChanger(Request $request, $id){
        $input = $request->all();
        $work = Work::find($id);
        if($input['status'] == "start"){
            $work->status = 'started';
            $work_log = new WorkLog();
            $work_log->works_id = $id;
            $work_log->started_time = Carbon::now();
            $work_log->status = 'started';
            $work_log->save();
        }elseif($input['status'] == "queue"){
            $work->status = 'queued';
            $work_log = WorkLog::where('works_id',$id)->where('status','=','started')->first();
            if($work_log){
                $work_log->ended_time = Carbon::now();
                $work_log->status = 'queued';
                $work_log->save();
            }

        }elseif($input['status'] == "complete"){
            $work->status = 'completed';
            $work_log = WorkLog::where('works_id',$id)->where('status','=','started')->first();
            if($work_log) {
                $work_log->ended_time = Carbon::now();
                $work_log->status = 'done';
                $work_log->save();
            }
        }
        $work->save();

        return redirect()->back();
    }

    public function weeklyReview(){
      $projects = DB::select(DB::raw("SELECT project_id, MAX(next_deadline) AS deadline,projects.`project_no`, projects.`project_text`,
       (SELECT `users`.`color_code` FROM `users` WHERE `users`.`id` = `projects`.`project_manager`) AS `color_code` 
        FROM works
        LEFT JOIN `users` ON `users`.`id` = `works`.`user_id`
        LEFT JOIN projects ON works.`project_id` = projects.`id` 
        WHERE projects.`status` = 'development'
        AND works.`status` = 'started'
        GROUP BY project_id;"));

      $data = [
        'projects' => $projects
      ];

      return view('designer.weekly_review', $data);
    }


}
