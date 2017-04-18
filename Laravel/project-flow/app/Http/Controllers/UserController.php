<?php

namespace App\Http\Controllers;

use Input;
use App\User;
use App\RoleUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class UserController extends Controller
{

    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     *
     */
    public function dashboard(){
        return view('dashboard.main');
    }

    /**
     *
     */
    public function index(){
        $users = DB::table('users')
            ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->leftJoin('roles', 'role_users.role_id', '=', 'roles.id')
            ->whereNotIn('role_users.role_id', [100])
            ->select('users.id','users.email','users.first_name','users.last_name','users.nick_name','roles.name as role_name','users.color_code')
            ->get();
        //return $users;
        $data = [
            'users' => $users
        ];
        return view('users.index',$data);
    }

    public function create()
    {
        $role_options = [''=>'Select One'];
        $role_options +=  DB::table('roles')->orderBy('id', 'asc')->lists('name','id');

        $data =[
            'role_options' => $role_options
        ];
        return view('users.create',$data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        //return $input;

        // create Super User
        $credentials = [
            'email'    => $input['email'],
            'password' => $input['password'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'nick_name' => $input['nick_name'],
            'color_code' => $input['color_code'],
            'font_color' => $input['font_color']
        ];
        //assign super user to role
        $user = Sentinel::registerAndActivate($credentials);

        $role = Sentinel::findRoleById($input['user_role']);
        $role->users()->attach($user);
        Session::put('flash_message', 'Successfully Created');     

        return redirect()->route('users.index');
    }

    public function edit($id){
        $role_options = [''=>'Select One'];
        $role_options +=  DB::table('roles')->orderBy('id', 'asc')->lists('name','id');

        $user = Sentinel::findById($id);
        //return $user;
        $roles = DB::table('users')
            ->where('users.id',$id)
            ->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')
            ->first();
        $role_id = $roles->role_id;

        $data =[
            'role_options' => $role_options,
            'user'          =>$user,
            'role_id'       => $role_id
        ];
        return view('users.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = Sentinel::findById($id);

        // create Super User
        $credentials = [
            'email'     => $input['email'],
            // 'password'  => $password,
            'first_name'=> $input['first_name'],
            'last_name' => $input['last_name'],
            'nick_name' => $input['nick_name'],
            'color_code'=> $input['color_code'],
            'font_color' => $input['font_color']
        ];

        if(!empty($input['password'])) {
            $credentials['password'] = $input['password'];

        }

        $user = Sentinel::update($user, $credentials);
        Session::put('flash_message', 'Successfully Edited');     

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = Sentinel::findById($id);
        $user->delete();
        Session::put('flash_message', 'Successfully deleted');     

        return redirect('/users');
    }

    /**
     * Return all project manager
     */
    public function user_delete($user_id){
        // Here PM means project manager & DL means Design Lead
        $user_lists_PM_DL = '';

        $user = User::find($user_id);
        $user_role = RoleUser::where('user_id',  $user_id)->first();

        if($user_role->role_id == 1 || $user_role->role_id == 2){
            $role_project_manager = Sentinel::findRoleBySlug('project-manager');
            $user_lists_PM_DL = $role_project_manager->users()->lists('nick_name','id');
        }

        if($user_role->role_id == 3){
           $role_designer = Sentinel::findRoleBySlug('designer');
           $user_lists_PM_DL = $role_designer->users()->lists('nick_name','id'); 
        }

        $data =[
            'user'                  =>$user,
            'user_lists_PM_DL'      =>$user_lists_PM_DL,
            'role_id'               =>$user_role->role_id
        ];

        return view('users.delete_user',$data);
    }
}
