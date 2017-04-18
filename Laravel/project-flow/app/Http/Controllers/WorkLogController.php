<?php

namespace App\Http\Controllers;


use App\Work;
use App\WorkLog;
use App\Project;
use App\User;

use Request;
use Input;
use Response;
use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class WorkLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,$project_id, $user_id)
    {  
         if(Request::ajax()){
            $input = Request::all();
            // print_r($input);
            // die();
            // $work_status = Work::with('project')->where(['project_id' => $project_id, 'user_id' => $user_id])->first();        
            // $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
                $work = Work::find($id);
            // if($work){
                // $work = Work::find($work_status->id);
                $work->status = 'queued';
                if($input['log_hour'] == 'other')
                   $work->used_hour = $work->used_hour + $input['other_time'];
                else
                  $work->used_hour = $work->used_hour + $input['log_hour']/60;
                // $work->used_hour = $work->used_hour + $input['log_hour']/60;
                // return $work->used_hour;
                if(Sentinel::getUser()->id == $user_id) {
                    $work->save();
                } 
            // }

            $project = Project::find($project_id);
            $project->spent_hours = $project->spent_hours + $input['log_hour']/60;
            // if($role_id == 3) {
             if(Sentinel::getUser()->id == $user_id) {
                 $project->save();
             }    
                // $project->save();
            // } 

            
            if(!empty($input['log_hour'])){
                // var_dump($input['log_hour']); exit;
                $work_log = new WorkLog;
                $work_log->works_id = $id;
                
                if($input['log_hour'] == 'other')
                   $work_log->spent_hours = $work_log->spent_hours + $input['other_time'];
                else
                  $work_log->spent_hours = $work_log->spent_hours + $input['log_hour']/60;
                // $work_log->spent_hours = $input['log_hour']/60;
               if(Sentinel::getUser()->id == $user_id) {
                 $work_log->save();
                }    
            }
            
             $response = array(
               'status' => 'success',
               'url'     =>  route('workflowDynamic'),
               'msg' => 'Task is now paused',
             );
             
            // Session::put('flash_message', 'Task is now paused');     
            
            return Response::json( $response );

            // return back();
         }

         // return back();
         
         $response = array(
             'status' => 'error',
             'url'     =>  route('workflowDynamic'),
             'msg' => 'Task is not paused',
           );
         
         // Session::put('flash_message', 'Task is not paused');     

         return Response::json( $response );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
