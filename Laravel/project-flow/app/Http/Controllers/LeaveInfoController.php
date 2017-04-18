<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Auth;
use View;
use App\LeaveInfo;
use App\User;
use Illuminate\Support\Facades\Validator;
use Response;
use Request;

class LeaveInfoController extends Controller
{
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
    public function store(Request $request)
    {
        //
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

    /**
     * This method will save the leave information
     */
    public function save_leave_info($user_id){
        $input = Request::all();

        // Validation check
        $validator = Validator::make($input,[
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'number_of_days' => 'required|numeric|min:0.1',
            'leave_type' => 'required'
        ]);

        if ($validator->fails()) {

             $response = array(
                'status' => 'validate_error',
                'msg' => 'Please give the relevant information',
                'errors' => $validator->errors()
              );      

            return Response::json( $response );
        }

        $user_role_id  = User::find(Sentinel::getUser()->id)->user_role->role_id;
        if($user_role_id == 1 || $user_role_id == 2){
            $leave_info = new LeaveInfo();
            $leave_info->user_id = $user_id;
            $leave_info->start_date = date('Y-m-d H:i:s', strtotime($input['start_date'])); 
            $leave_info->end_date = date('Y-m-d H:i:s', strtotime($input['end_date'])); 
            $leave_info->number_of_days = $input['number_of_days'];
            $leave_info->leave_added_by = Sentinel::getUser()->id;;
            $leave_info->leave_type = $input['leave_type']; 
            $leave_info->save();

             $response = array(
               'status' => 'success',
               'msg' => 'Leave information saved successfully',
             );
                        
            return Response::json( $response );
        }
           
         $response = array(
            'status' => 'error',
            'msg' => 'Sorry you haven\'t right to add leave.',
          );      

        return Response::json( $response );
    }

    public function leave_info_export($user_id){
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['name','start_date','end_date','number_of_days','leave_approved_by','leave_type', 'created_at']);

        // $leave_infos = Work::where(['user_id' => $user_id])->get();
        $leave_infos = LeaveInfo::where('user_id', $user_id)->get();
        // return $leave_infos;
        if(count($leave_infos)){  
            foreach ($leave_infos as $leave_info) {
                $designer = User::find($user_id);
                $designer_full_name = $designer->first_name.' '.$designer->last_name;

                $manager_who_approved_leave = User::find($leave_info->leave_added_by);
                $manager_full_name = $manager_who_approved_leave->first_name.' '.$manager_who_approved_leave->last_name;

                $leave_type = $leave_info->leave_type.' '.'leave';
                $csv->insertOne([$designer_full_name, $leave_info->start_date, $leave_info->end_date, $leave_info->number_of_days, $manager_full_name, $leave_type, $leave_info->created_at]);
            }          
        }

        $csv->output('leave_info.csv');
    }

    // This will load the leave form
    public function add_leave_form($user_id){
         $returnHTML = view('forms.leave_form',compact('user_id',$user_id))->render();
         $response = array(
           'success' => true,
           'html'   => $returnHTML,
         );                          
        return Response::json( $response );
    }

    // This will show leave info
    public function show_leave_info($user_id){
         $all_leaves = LeaveInfo::where('user_id',$user_id)->orderBy('created_at','desc')->get();
         $data = [
            // 'designers'             => $designers
            'all_leaves' => $all_leaves
         ];
         $returnHTML = view('leaves.show_leave_info',$data)->render();
         $response = array(
           'success' => true,
           'html'   => $returnHTML,
         );                          
        return Response::json( $response );
    }

    /**
     * This will remove a leave
     */
    public function remove_a_leave($leave_id){
        $leave = LeaveInfo::find($leave_id);
        if($leave->delete()){
             $response = array(
               'success' => true,
               'msg'   => 'leave information successfully deleted',
             );                          
            return Response::json( $response );
        }        
    }
}
