<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use View;
use Input;
use App\User;
use App\Work;
use App\Project;
use App\RoleUser;
use App\LeaveInfo;
use Request;
use Response;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Validator;
use App\Libs;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class WorkFlowController extends Controller
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

    // public function __construct()
    // {
    //     //$this->middleware(['projectManager','designer']);
    // }

    public function index()
    {
        $users = User::leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.slug', '=', 'designer')
            ->select(
                'users.id as id',
                'users.nick_name',
                'users.first_name',
                'users.last_name',
                'users.email'
            )
            ->get();

        


        // get all works from studio
        $studio_works = Project::all();
        $data = [
            'users' => $users,
            'studio_works' => $studio_works,
            'role_id'  => User::find(Sentinel::getUser()->id)->user_role->role_id            
        ];
           // Session::flash('flash_message', 'Brief Created Successfully');     

        return view('workflow.index', $data);
    }

    public function workflowDynamic()
    {
        if(Request::ajax()){
            $users = User::leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
                ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
                ->where('roles.slug', '=', 'designer')
                ->select(
                    'users.id as id',
                    'users.nick_name',
                    'users.first_name',
                    'users.last_name',
                    'users.email'
                )
                ->get();

            $user_works =   User::with('works.project')
                           ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
                           ->where('role_users.role_id', '=', '3')
                           ->get();

            // echo "<pre>";
            //   print_r($user_works);
            // echo "</pre>";
            // die();

            // get all works from studio
            $studio_works = Project::all();
            $data = [
                'users' => $users,
                'studio_works' => $studio_works,
                'logged_in_user' => Sentinel::getUser()->id,
                'user_works'   => $user_works,
                'role_id'  => User::find(Sentinel::getUser()->id)->user_role->role_id
                // 'url'           => route('workflowDynamic') 
            ];
            return view('workflow.dynamiccontent', $data)->render();           
        }

        
        // $users = User::leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
        //     ->leftJoin('roles', 'roles.id', '=', 'role_users.role_id')
        //     ->where('roles.slug', '=', 'designer')
        //     ->select(
        //         'users.id as id',
        //         'users.nick_name',
        //         'users.first_name',
        //         'users.last_name',
        //         'users.email'
        //     )
        //     ->get();

        // $user_works =   User::with('works.project')
        //                ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
        //                ->where('role_users.role_id', '=', '3')
        //                ->get();

        // // get all works from studio
        // $studio_works = Project::all();
        //  // return $studio_works;
        // $data = [
        //     'users' => $users,
        //     'studio_works' => $studio_works,
        //     'logged_in_user' => Sentinel::getUser()->id,
        //     'user_works'   => $user_works,
        //     'role_id'  => User::find(Sentinel::getUser()->id)->user_role->role_id
        //     // 'url'           => route('workflowDynamic') 
        // ];
        // return view('workflow.dynamiccontent', $data);      
    }

    public function toWorking(Request $request)
    {
        $input = $request->all();
        $old_work = Work::where('status', 'working')
            ->where('user_id', $input['user_id'])
            ->first();
        if (!$old_work) {
            $work = Work::find($input['w_id']);
            $work->status = 'working';
            $work->save();
        }

    }

    /**
     *  create new work for any user
     * @param Request $request
     */
    public function toQueue(Request $request)
    {
        $input = $request->all();
        $old_work = Work::where('project_id', $input['p_id'])
            ->where('status', 'queued')
            ->where('user_id', $input['user_id'])
            ->first();
        if (!$old_work) {
            $work = new Work();
            $work->project_id = $input['p_id'];
            $work->user_id = $input['user_id'];
            $work->sort_order = $input['sort_order'];
            $work->status = 'queued';
            $work->save();
        }

    }


    /**
     * change status studio to client
     * @param Request $request
     */
    // public function studioToClient(Request $request, $id)
    public function studioToClient($id)
    {
        return $id;
        $project = Project::findOrFail($id);
        $project->status = 'feedback';
        $project->save();

        // return back();
    }

    public function studioFeedbackToClient($id) {

        if(Request::ajax()){
           $project = Project::findOrFail($id);
           $project->status = 'feedback';

           $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
           if($role_id == 1 || $role_id == 2) {
               $project->save();
           }
           
           // if(Sentinel::getUser()->id == $project->project_manager) {
           //     $project->save();
           //  }   

            $response = array(
              'status' => 'success',
              'url'     =>  route('workflowDynamic'),
              'msg' => 'Project is now ready for client feedback',
            );
            
           // Session::put('flash_message', 'Project is now ready for client feedback');     
           
           return Response::json( $response );
        }

        $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Project is not ready for client feedback',
          );
        
        // Session::put('flash_message', 'Project is not ready for client feedback');     

        return Response::json( $response );

    }

    public function toArchive($id) {
        
        if(Request::ajax()){
            $project = Project::findOrFail($id);
            $project->status = 'closed';
            $works = Work::where('project_id', $id)->get();
            if(count($works)){
                foreach ($works as $work) {
                     DB::table('works')->where('project_id', $work->project_id)->update(['status' => 'closed']);       
                }
            }
            
            $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
            if($role_id == 1 || $role_id == 2) {
            // if(Sentinel::getUser()->id == $project->project_manager) {
                $project->save();
            }

            $response = array(
              'status' => 'success',
              'url'     =>  route('workflowDynamic'),
              'msg' => 'Project is closed successfully',
            );
            
           // Session::put('flash_message', 'Project is closed successfully');     
           
           return Response::json( $response );
        }

        $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Project is not closed successfully',
          );
        
        // Session::put('flash_message', 'Project is not closed successfully');     

        return Response::json( $response );
    }

    /**
     * This method will do project completion works
     */
    public function projectCompleted($project_id) {
        
        if(Request::ajax()){
            $project = Project::findOrFail($project_id);
            $project->status = 'completed';
            $works = Work::where('project_id', $project_id)->get();
            if(count($works)){
                foreach ($works as $work) {
                     DB::table('works')->where('project_id', $work->project_id)->update(['status' => 'completed']);       
                }
            }
            
            $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
            if($role_id == 1 || $role_id == 2) {
            // if(Sentinel::getUser()->id == $project->project_manager) {
                $project->save();
            }

            $response = array(
              'status' => 'success',
              'url'     =>  route('workflowDynamic'),
              'msg' => 'Project is completed successfully',
            );
            
           // Session::put('flash_message', 'Project is closed successfully');     
           
           return Response::json( $response );
        }

        $response = array(
            'status' => 'error',
            'url'     =>  route('workflowDynamic'),
            'msg' => 'Project is not completed successfully',
          );
        
        // Session::put('flash_message', 'Project is not closed successfully');     

        return Response::json( $response );
    }



    /**
     * change status studio to client
     * @param Request $request
     */
    public function clientToStudio(Request $request)
    {
        $input = $request->all();
        //return $input;
        $projeet = Project::find($input['p_id']);
        $projeet->status = 'working';
        $projeet->save();
    }

    public function cleintReviewProjectUpdate(){
        // dd('hit');
        //check which submit was clicked on
        if(Input::get('brief')) {
            dd('hit');
            $this->postLogin(); //if login then use this method
        } elseif(Input::get('register')) {
            $this->postRegister(); //if register then use this method
        }
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $total_time = $input['hour'] * 3600 + $input['minute'] * 60;
        $work = Work::find($id);
        $work->priority = isset($input['priority']) ? $input['priority'] : 2;
        $work->next_deadline = date('Y-m-d H:i:s', strtotime($input['next_deadline']));
        $work->assigned_hour = $total_time;
        $work->save();

        $result = [
            'status' => 'success'
        ];
        return $result;
    }


    public function briefProject($id)
    {
        $role_designer = Sentinel::findRoleBySlug('designer');
        $users = $role_designer->users()->lists('nick_name', 'id');
        $data = [
            'id' => $id,
            'leader_options' => $users
        ];
        return view('workflow.brief', $data);
    }


    public function clientBriefProject($id)
    {   

        $project = Project::find($id);
        $works_brief = DB::table('works')->where('project_id',$id)->get();
        $group = $project->users()->lists('nick_name','user_id');
        // $group = $project->users()->lists('user_id');
        $leader_name = User::find($project->leader_id)->nick_name;
        $leader_id = User::find($project->leader_id)->id;
        $leader_list = $project->users()->lists('user_id')->toArray();
        $role_designer = Sentinel::findRoleBySlug('designer');
        $designers = $role_designer->users()->lists('nick_name','id');
        // print_r(array_keys($group));
        // die();
        $data = [
            'id'             => $id,
            'leader_name'    => $leader_name,
            'project'        => $project,
            'works_brief'    => $works_brief,
            'group'          => $group,
            'leader_list'    => $leader_list,
            'leader_id'     => $leader_id,
            'designers'     => $designers        
        ];

        return view('workflow.clientBrief',$data)->with('data',$data);
    }

    public function cleintReviewProject($id, $work_status)
    {
       $project = Project::find($id);
       
       if(Sentinel::getUser()->id == $project->project_manager) {
            $autheticate_user = 1;
       } else {
            $autheticate_user = 2;
       }
       
        $leader_name = User::find($project->leader_id)->nick_name;
        $group = $project->users()->lists('nick_name','user_id');

        $data = [
            'id'             => $id,
            'leader_name'    => $leader_name,
            'project'        => $project,
            'group'          => $group,
            'autheticate_user' => $autheticate_user,
            'work_status'    => $work_status,
            'role_id'  => User::find(Sentinel::getUser()->id)->user_role->role_id
            
        ];
        return view('workflow.clientReview',$data)->with('data',$data);
    }

    public function briefSubmit(Request $request, $id)
    {
        // close all before tasks
        $works = Work::where('project_id', $id)
            ->where('status', 'queued')
            ->update(['status' => 'closed']);


        $input = $request->all($id);
        foreach ($input['group'] as $group) {
            $work = new Work();
            $work->project_id = $id;
            $work->user_id = $group;
            $work->start_time = date('Y-m-d', strtotime($input['start_time']));
            $work->next_deadline = date('Y-m-d H:i:s', mktime(23, 59, 59, date("m",strtotime($input['next_deadline'])), date("d",strtotime($input['next_deadline'])), date("Y",strtotime($input['next_deadline']))));
            $work->status = 'queued';
            $work->save();
        }

        $project = Project::find($id);
        $project->leader_id = $input['leader_id'];
        $project->status = 'development';
        $project->save();

        return redirect()->route('workflow');
    }

    public function reviewProject($id)
    {
        $role_designer = Sentinel::findRoleBySlug('designer');
        $users = $role_designer->users()->lists('nick_name', 'id');
        $data = [
            'id' => $id,
            'leader_options' => $users
        ];
        return view('workflow.review', $data);
    }

    public function reviewSubmit(Request $request, $id)
    {

        $works = Work::where('project_id', $id)
            ->where('status', 'queued')
            ->update(['status' => 'closed']);
        $project = Project::find($id);
        $project->status = 'studio-feedback';
        $project->save();

        return redirect()->route('workflow');
    }

    public function clientFeedbackProject($id)
    {
        $role_designer = Sentinel::findRoleBySlug('designer');
        $users = $role_designer->users()->lists('nick_name', 'id');
        $data = [
            'id' => $id,
            'leader_options' => $users
        ];
        return view('workflow.clientFeedback', $data);
    }

    public function clientFeedbackSubmit(Request $request, $id)
    {

        $works = Work::where('project_id', $id)
            ->where('status', 'queued')
            ->update(['status' => 'closed']);

        $project = Project::find($id);
        $project->status = 'client-feedback';
        $project->save();

        return redirect()->route('workflow');
    }

    public function reBriefProject($id)
    {
        $old_brief = Work::where('project_id', $id)->orderby('created_at', 'desc')->first();
        $project = Project::find($id);

        $role_designer = Sentinel::findRoleBySlug('designer');
        $users = $role_designer->users()->lists('nick_name', 'id');
        $data = [
            'id' => $id,
            'leader_options' => $users,
            'old_brief' => $old_brief,
            'project' => $project,
        ];
        return view('workflow.reBrief', $data);
    }

    public function closeProject($id)
    {

        $works = Work::where('project_id', $id)
            ->where('status', 'queued')
            ->update(['status' => 'closed']);

        $project = Project::find($id);
        $project->status = 'closed';
        $project->save();

        return redirect()->route('workflow');
    }

    public function briefProjectStatus($work_id) {

        $work_status = Work::with('project')->where(['id' => $work_id])->first();
        // return $work_status;
        $user_role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;

        if(Sentinel::getUser()->id == $work_status->user_id) {
             $authenticate_user = 1;
        } else {
             $authenticate_user = 2;
        }

        return view('workflow.projectStatus', compact('work_status', 'user_role_id', 'authenticate_user'));

    }

    public function weeklyWorkflow(){

      //   $users =   User::leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
      //                  ->where('role_users.role_id', '=', '3')
      //                  ->get();
      // $data = [
      //   'users' => $users
      //   // 'url'     =>  route('weeklyworkflow')
      // ];

      return view('workflow.weekly_workflow_main');
    }

    public function weeklyWorkflowDynamicContent(){

        $users =   User::leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
                       ->where('role_users.role_id', '=', '3')
                       ->get();
      $data = [
        'users' => $users
        // 'url'     =>  route('weeklyworkflow')
      ];

      return view('workflow.weekly_workflow', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brief_edit($work_id)
    {
        // project_number, project_name, no. of spent hours 
        $brief = Work::find($work_id);
        $project = Project::find($brief->project_id);
        $group = $project->users()->lists('nick_name','user_id');
        // $leader_name = User::find($project->leader_id)->nick_name;
        // $leader_id = User::find($project->leader_id)->id;
        $design_lead_name = $project->teamleader->nick_name;
        $design_lead_id = $project->leader_id;
        $design_lead_array = $project->users()->lists('user_id')->toArray();
        $role_designer = Sentinel::findRoleBySlug('designer');
        $designers = $role_designer->users()->lists('nick_name','id');

        $data = [
            'design_lead_name'      => $design_lead_name,
            'project'               => $project,
            'brief'                 => $brief,
            'group'                 => $group,
            'design_lead_array'     => $design_lead_array,
            'design_lead_id'        => $design_lead_id,  
            'designers'             => $designers
        ];

        return view('workflow.edit_brief',$data);
        // return view('workflow.edit_brief',$data)->with('data',$data);
    }

    /**
     * This will delete a brief
     */
    public function brief_delete($work_id){
         // if(Request::ajax()){
            $work = Work::find($work_id);
            $work->delete();
             $response = array(
               'status' => 'success',
               'url'     =>  route('workflowDynamic'),
               'msg' => 'Brief is deleted successfully',
             );

            return Response::json( $response );
        // }
    }

}
