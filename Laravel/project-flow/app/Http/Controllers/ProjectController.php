<?php

namespace App\Http\Controllers;

use \League\Csv;
use League\Csv\Reader;
use App\ProjectUser;
use App\Project;
use App\User;
use App\Work;
use \DB;
use App\RoleUser;
use Request;
use Response;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Controllers\Controller;
use Session;
use Input;

class ProjectController extends Controller
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
    public function index($sorting_column='created_at', $sort_order='ASC')
    {       
            if(Request::all()){
              $input = Request::all();
              // Session::put('key','value');
              // Session::get('key');
              // Session::has('key');
              // var_dump($input);
              // Session::flush();              
              if(array_key_exists('page', $input)){
                  // $uri = Request::path();
                  // $uri = Request::url();
                  // $uri = Request::fullUrl();
                  // var_dump(Input::old('sorting_column'));
                  // var_dump(Input::old('sort_order'));
                  // Request $request;
                  // var_dump($request);
                  if(Session::has('sorting_column') && Session::has('sort_order')){
                    $sorting_column   =  Session::get('sorting_column');
                    $sort_order       =  Session::get('sort_order');
                  }
                  // var_dump($sorting_column);
                  // var_dump($sort_order);
              } else { 
                // if(!array_key_exists('page', $input))
                //   Session::flush();               
                $sorting_column   = $input['sorting_column'];
                $sort_order       = $input['sort_order'];

                // if(!Session::has('sorting_column') && !Session::has('sort_order')){
                    Session::put('sorting_column',$input['sorting_column']);
                    Session::put('sort_order',$input['sort_order']);
                    // Session::get('key');
                // }
               
              // Session::has('key');
              }               
            }           

            // if(Request::all()){
            //   $input = Request::all();
            //   // var_dump($input);
            //   if(isset($input['page'])){
            //     $page = $input['page'];
            //     if($page <= 1){
            //       $sorting_column   = $input['sorting_column'];
            //       $sort_order       = $input['sort_order'];
            //     }                
            //   }               
            // }           

            $jobs = '';
            $project_manager_lists = '';
            $design_lead_lists = '';

            if (Sentinel::getUser()->inRole('super-user')) {
                $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
            }elseif (Sentinel::getUser()->inRole('project-manager')) {
                $id = Sentinel::getUser()->id;      
                $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;          
            }elseif(Sentinel::getUser()->inRole('designer')){
                $id = Sentinel::getUser()->id;      
                $role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;          
            }

            if(Sentinel::getUser()->inRole('super-user') || Sentinel::getUser()->inRole('project-manager')){
               $role_project_manager = Sentinel::findRoleBySlug('project-manager');
               $project_manager_lists = $role_project_manager->users()->lists('nick_name','id');

               $role_designer = Sentinel::findRoleBySlug('designer');
               $design_lead_lists = $role_designer->users()->lists('nick_name','id');
            }

           // $jobs = Project::where('status','!=', 'closed')->orderBy('created_at', 'DESC')->get();
           // $jobs = Project::where('status','!=', 'closed')->orderBy($sorting_column,  $sort_order)->paginate(20);
           // $jobs = Project::where('status','!=', 'closed')->orderBy($sorting_column,  $sort_order)->paginate(20);
           $jobs = Project::where('status','!=', 'closed')->orderBy($sorting_column,  $sort_order)->paginate(20);


            $data = [
                'jobs'                  => $jobs,
                'role_id'               => $role_id,
                'project_manager_lists' => $project_manager_lists,
                'design_lead_lists'     => $design_lead_lists,
                'sort_order'            => $sort_order     
            ];
           
            return view('projects.index', $data);

    }

    /**
     * Display the list of working project
     */

    public function working()
    {

        if (Sentinel::getUser()->inRole('super-user')) {
            $jobs = Project::paginate(10);
        }elseif (Sentinel::getUser()->inRole('project-manager')) {
            $id = Sentinel::getUser()->id;
            $jobs = Project::where(['project_manager' => $id, 'status' => 'development'])->paginate(10);
        }
        $data = [
            'jobs' => $jobs,
        ];
        return view('projects.working', $data);
    }

    /**
     * Display the list of closed project
     */

    public function archievedProjects()
    {

        if (Sentinel::getUser()->inRole('super-user')) {
            $jobs = Project::where(['status' => 'closed'])->paginate(10);
        }elseif (Sentinel::getUser()->inRole('project-manager')) {
            // $id = Sentinel::getUser()->id;
            $jobs = Project::where(['status' => 'closed'])->paginate(10);
        }elseif (Sentinel::getUser()->inRole('designer')) {
            // $id = Sentinel::getUser()->id;
            $jobs = Project::where(['status' => 'closed'])->paginate(10);
        }
        $data = [
            'role_id' => User::find(Sentinel::getUser()->id)->user_role->role_id,
            'jobs' => $jobs,
        ];
        return view('projects.archieve', $data);
    }

    /**
     * Export data as csv
     * @param  int $project_id 
     * @return [type]             [description]
     */
    public function export($project_id){  
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['id','project_no','project_text','project_name','company_name','start_time','deadline','leader_id','project_manager','description','status','created_at','spent_hours']);
        $project = Project::find($project_id);

        if ($project->status == 'development') {
            $project->status = 'With Studio';
        } elseif ($project->status == 'feedback') {
            $project->status = 'Client';
        } elseif($project->status == 'default') {
            $project->status = 'With Client Service Team';
        }
        
        $csv->insertOne([$project->id, $project->project_no, $project->project_text, $project->project_name, $project->company_name, $project->start_time, $project->deadline, $project->leader_id, $project->project_manager, $project->description, $project->status, $project->created_at, $project->spent_hours ]);
        $project_users = Work::with('user')->where('project_id','=', $project_id)->get();    

        if(count($project_users)){
            $csv->insertOne('');
            $csv->insertOne(['Member Name', 'Worked Hour']);
            foreach ($project_users as $project_user) {
                    $csv->insertOne([$project_user->user->first_name.' '.$project_user->user->last_name, $project_user->used_hour]);
            }
        }

        $csv->output($project->project_name.'.csv');
    }

    /**
     * This method will all of the projects of a leader
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function getLeaderProjects($user_id){
        if(Request::ajax()) {  
            $leader_of_projects = Project::where('leader_id', '=', $user_id)->where('status', '!=', 'closed' )->get();
            return Response::json( $leader_of_projects );
            return $leader_of_projects;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_designer = Sentinel::findRoleBySlug('designer');
        $users = $role_designer->users()->lists('nick_name','id');

        $role_project_manager = Sentinel::findRoleBySlug('project-manager');
        $project_manager_lists = $role_project_manager->users()->lists('nick_name','id');

        $data = [
            'leader_options' => $users,
            'project_manager_lists' => $project_manager_lists
        ];

        return view('projects.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input =  Request::all();
        // return $input;
        // data save to db and logical part here
        // $input['project_manager'] = Sentinel::getUser()->id;
        // $input['deadline'] = date('Y-m-d H:i:s', strtotime($input['deadline']));
        $input['status'] = 'default';

        $project = Project::create($input);

        if(count($input['team_members'])){
            foreach($input['team_members'] as $group ){
            $work = new ProjectUser();
            $work->project_id = $project->id;
            $work->user_id = $group;
            $work->save();
          }
        }

        if($project)
            Session::put('flash_message', 'Successfully Created');   
        else
            Session::put('flash_error', 'Sorry project can\'t be created try again!!'); 
        return redirect()->route('projects.index');
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
        $role_designer = Sentinel::findRoleBySlug('designer');
        $users = $role_designer->users()->lists('nick_name','id');
        $projects = Project::find($id);
        $group = $projects->users()->lists('user_id')->toArray();
        $data = [
            'leader_options' => $users,
            'projects'      =>$projects,
            'group'         =>$group
        ];

        return view('projects.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::all();

        $input['deadline'] = date('Y-m-d H:i:s', strtotime($input['deadline']));
        $project =  Project::findOrFail($id);
        $project->fill($input)->save();
        $empty_group = array();
        $group = isset($input['group']) ? $input['group'] : $empty_group;
        $updated = $project->users()->sync($group);

        if($updated)
            Session::put('flash_message', 'Successfully Edited');   
        else
            Session::put('flash_error', 'Sorry project can\'t be edited try again!!');   
        
        // after success goto list
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $project = Project::find($id);
        $project->delete();
        if(empty($deleted))
            Session::put('flash_message', 'Successfully Deleted');   
        else
            Session::put('flash_error', 'Sorry project can\'t be deketed try again!!');
        // Session::put('flash_message', 'Successfully deleted');     
        return redirect('/projects');
    }

    public function archiveProjectDeletion($id){
        $project = Project::find($id);
        $project->delete();
        if(empty($deleted))
            Session::put('flash_message', 'Successfully Deleted');   
        else
            Session::put('flash_error', 'Sorry project can\'t be deketed try again!!');
        // Session::put('flash_message', 'Successfully deleted');     
        return redirect('/projects_archieve');
    }

    /**
     * A project will archived from project list by super user or project-manager 
     * @return [type] [description]
     */
    public function archive_a_project($project_id) {
        $project = Project::find($project_id);
        $project->status = 'closed';
        $project->save();
        return redirect('/projects');
    }

    public function changeProjectManager($project_id){
        // return $_POST['value'];
        // die();
        $input = Request::all();
        // print_r($input);die();
        $project = Project::find($project_id);
        // return $project;
        $project->project_manager = $input['value'];
        
        if($project->save()){
          $response = array(
              'status' => 'success',
              'msg' => 'Manager changed successfully',
            );
            return Response::json( $response );
        }
           
        $response = array(
            'status' => 'error',
            'msg' => 'Sorry maanger didn\'t change',
          );
          return Response::json( $response );

        
        
        // Session::put('flash_message', 'Sorry brief is not created.');     

        
    }

    // Change design lead of the project
    public function changeDesignLead($project_id){
        // return $_POST['value'];
        // die();
        $input = Request::all();
        // print_r($input);die();
        $project = Project::find($project_id);
        // return $project;
        $project->leader_id = $input['value'];
        
        if($project->save()){
          $response = array(
              'status' => 'success',
              'msg' => 'Design lead changed successfully',
            );
            return Response::json( $response );
        }
           
        $response = array(
            'status' => 'error',
            'msg' => 'Sorry design lead didn\'t change',
          );
          return Response::json( $response );         
    }

   /**
    * Change project manager of deleted user
    */
    public function change_pm_delete_user($user_id=null){
      // Change the role_id of the user 100 for deleted user
      $input = Request::all();
      // var_dump($input); exit;
      // var_dump($input);
      // exit;
      // DB::table('role_users')
      // ->where(['user_id' => $user_id])
      // ->update(['role_id' => 100, 'user_id' => -999]);

      $user = RoleUser::where('user_id',  $user_id)->first();
      if($user->role_id == 2){
        $projects = Project::where('project_manager',$user_id)->get();
        if(count($projects)){
          foreach ($projects as $project) {
            $project->project_manager = $input['project_manager_or_lead'];
            $project->save();
          }
        }
      } elseif ($user->role_id == 3) {
        $projects = Project::where('leader_id',$user_id)->get();
        if(count($projects)){
          foreach ($projects as $project) {
            $project->leader_id = $input['project_manager_or_lead'];
            $project->save();
          }
        }
      }

       DB::table('role_users')
      ->where(['user_id' => $user_id])
      ->update(['role_id' => 100]);

     Session::put('flash_message', 'Users deleted successfully');
     return redirect('/users');
    }

}
