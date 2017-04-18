<?php

namespace App\Http\Controllers;

use Auth;
use App\Work;
use App\Project;
use App\RoleUser;
use \DB;
use App\User;
use App\WorkLog;

// use Illuminate\Http\Request;
use Request;
use Input;
use Response;
use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class WorkController extends Controller
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
    public function store($project_id)
    {
        // if(Request::ajax()) {
          $input = Request::all();
          // print_r($input); die();
          if(isset($input['assigned_to'])){
            foreach ($input['assigned_to'] as $user_id) {
                $work_exists = Work::where(['project_id' => $project_id, 'user_id' => $user_id])->first();
                if(count($work_exists) && ($work_exists->brief_number == $input['brief_number'])){
                    $work = Work::find($work_exists->id);
                    $work->est_start_time= date('Y-m-d g:i:s', strtotime($input['est_start_time']));
                   
                    if($input['next_deadline'] == 'no deadline')
                        $work->next_deadline = date('Y-m-d g:i:s', strtotime('+1 years'));
                    else
                        $work->next_deadline = date('Y-m-d g:i:s', strtotime($input['next_deadline']));

                    $work->next_deadline = '';
                    $work->status = 'queued';

                    if($input['assigned_hour'] == 'other')
                       $work->assigned_hour = $input['other_time'];
                    else
                      $work->assigned_hour = $input['assigned_hour']/60;
                    $work->task = $input['task'];
                    $work->save();
                } else {
                    $work = new Work();
                    $work->project_id = $project_id;
                    $work->user_id = $user_id;
                    $work->est_start_time= date('Y-m-d g:i:s', strtotime($input['est_start_time']));

                    if($input['next_deadline'] == 'no deadline')
                         $work->next_deadline = date('Y-m-d g:i:s', strtotime('+1 years'));
                    else
                        $work->next_deadline = date('Y-m-d g:i:s', strtotime($input['next_deadline']));

                    $work->status = 'queued';
                    $work->brief_number = $input['brief_number'];
                    
                    if($input['assigned_hour'] == 'other')
                       $work->assigned_hour = $input['other_time'];
                    else
                      $work->assigned_hour = $input['assigned_hour']/60;
                    $work->task = $input['task'];                    
                    $work->save();
                }
            }
            $project_status = 1;
        }
            

            if($project_status == 1) {
                $project = Project::find($project_id);
                $project->status = 'development';
                $project->leader_id = $input['project_leader'];
                $project->save();
                Session::put('flash_message', 'Brief Created Successfully');     

            }

            $response = array(
              'status' => 'success',
              'url'     =>  route('workflowDynamic'),
              'msg' => 'Brief created successfully',
            );
                       
           return Response::json( $response );
      // }

        $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Sorry brief is not created.',
          );
        
        // Session::put('flash_message', 'Sorry brief is not created.');     

        return Response::json( $response );

        // return redirect()->route('workflow');
        
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
     * Change task status as started
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update($id,$project_id, $user_id, $brief_number)
    {

        if(Request::ajax()){
            // var_dump($id);die();
            // return $id;
            $get_work = Work::find($id);
            // Work::with('project')->where(['project_id' => $project_id, 'user_id' => $user_id, 'brief_number'=>$brief_number])->first();
            // if($get_work) {
                $logged_in_user = Sentinel::getUser()->id;
                if( $logged_in_user != $get_work->user_id){
                    $work = new Work;
                    $work->project_id = $get_work->project_id;
                    $work->user_id = $logged_in_user;
                    $work->assigned_hour = $get_work->assigned_hour;
                    $work->used_hour = 0;
                    $work->assigned_hour = $get_work->assigned_hour;
                    if($get_work->start_time == '0000-00-00 00:00:00')
                       $work->start_time= date("Y-m-d H:i:s");
                    else
                       $work->start_time = $get_work->start_time;
                    $work->next_deadline = $get_work->next_deadline;                  
                    $work->status = 'started';                  
                    $work->sort_order = $get_work->sort_order;                  
                    $work->brief_number = $get_work->brief_number;                  
                    $work->task = $get_work->task;                  
                    $work->est_start_time = $get_work->est_start_time;   
                    // if(User::find(Sentinel::getUser()->id)->user_role->role_id == 3) {
                        $work->save();
                        $get_work->status = 'closed';
                        $get_work->save();
                    // } 

                     $response = array(
                       'status' => 'success',
                       'url'     =>  route('workflowDynamic'),
                       'msg' => 'Task is now started',
                     );
                     
                    // Session::put('flash_message', 'Task is now started');     
                    
                    return Response::json( $response );              
                }

                if($get_work->start_time == '0000-00-00 00:00:00'){
                   $get_work->start_time= date("Y-m-d H:i:s");
                }
                $get_work->status = 'started';

                // if(User::find(Sentinel::getUser()->id)->user_role->role_id == 3) {
                    $get_work->save();
                // }
            // }


            $response = array(
              'status' => 'success',
              'url'     =>  route('workflowDynamic'),
              'msg' => 'Task is now started',
            );
            
           // Session::put('flash_message', 'Task is now started');     
           
           return Response::json( $response );
        }

        $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Task is not started successfully',
          );
        
        // Session::put('flash_message', 'Task is not started successfully');     

        return Response::json( $response );
        
        // return back();
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

    public function projectToDone($id,$project_id, $user_id, $brief_number){
        if(Request::ajax()){ 
            $input = Request::all();
            // Store Log Hour in corresponding table
            $get_work = Work::find($id);
            $get_work->used_hour = $get_work->used_hour + $input['log_hour']/60;
            $get_work->save();

            $project = Project::find($project_id);
            $project->spent_hours = $project->spent_hours + $input['log_hour']/60;
            $project->save();

            
            if(!empty($input['log_hour'])){
                $work_log = new WorkLog;
                $work_log->works_id = $id;
                $work_log->spent_hours = $input['log_hour']/60;
                $work_log->save();
            }

            // This will return those projects where the project status is not closed & 
            // a work is assigned for a designer or designer working on that project
            $projects = Work::where('project_id', '=', $project_id)
            ->where('status', '!=', 'closed')
            ->whereNotIn('id', [$id])
            ->get();
            // $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
            if(count($projects)){                
                if(Sentinel::getUser()->id == $user_id) {
                    // Update project status closed
                    DB::table('works')
                    ->where(['id' => $id])
                    ->update(['status' => 'closed']);
                } 
            } else {
                if(Sentinel::getUser()->id == $user_id) {
                    // Update the work status closed
                    DB::table('works')
                    ->where(['id' => $id])
                    ->update(['status' => 'closed']);
                }

                $project = Project::find($project_id);
                $project->status = 'default';
                $project->save();
            }        
             $response = array(
               'status' => 'success',
               'url'     =>  route('workflowDynamic'),
               'msg' => 'Task is completed.',
             );
             
            // Session::put('flash_message', 'Task is completed');     
            
            return Response::json( $response );
            // return back();
        }

         $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Task is not completed',
          );
        
        // Session::put('flash_message', 'Task is not completed');     

        return Response::json( $response );
    }

    public function brief_update($work_id){
         if(Request::ajax()){
          $input = Request::all();
          // var_dump($input);die;
          $work = Work::find($work_id);
          // if(isset($input['assigned_to'])){
          //   foreach ($input['assigned_to'] as $user_id) {
                $work->user_id = $input['assigned_to'];
                $work->task = $input['task'];
                $work->est_start_time= date('Y-m-d g:i:s', strtotime($input['est_start_time']));                   
                if($input['next_deadline'] == 'no deadline')
                    $work->next_deadline = date('Y-m-d g:i:s', strtotime('+1 years'));
                else
                    $work->next_deadline = date('Y-m-d g:i:s', strtotime($input['next_deadline']));
                if($input['assigned_hour'] == 'other')
                   $work->assigned_hour = $input['other_time'];
                else
                  $work->assigned_hour = $input['assigned_hour']/60;
                $work->brief_number = $input['brief_number'];
                $work->save();
        //     } 
        // }
       // Session::put('flash_message', 'Brief Created Successfully');

       $response = array(
         'status' => 'success',
         'url'     =>  route('workflowDynamic'),
         'msg' => 'Brief updated successfully',
       );          
      return Response::json( $response );
    }

      $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Brief not successfully updated',
     );
        
    }

}
