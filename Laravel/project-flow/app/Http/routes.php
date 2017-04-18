<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'home', 'uses' =>'AuthController@home']);

// Authentication routes...
Route::get('login', ['as' => 'getlogin', 'uses' =>'AuthController@getLogin']);
// Route::get('auth/login', ['as' => 'getlogin', 'uses' =>'AuthController@getLogin']);
// Route::post('auth/login', ['as' => 'postlogin', 'uses' =>'AuthController@postLogin']);
Route::post('login', ['as' => 'postlogin', 'uses' =>'AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' =>'AuthController@getLogout']);
// Registration routes...
Route::get('auth/register', ['as' => 'getregister', 'uses' =>'AuthController@getRegister']);
Route::post('auth/register', ['as' => 'postregister', 'uses' =>'AuthController@postRegister']);
// recover routes
Route::get('auth/forgot-pass', ['as' => 'forgotPass', 'uses' =>'AuthController@forgotPass']);
Route::post('auth/forgot-pass', ['as' => 'postForgotPass', 'uses' =>'AuthController@postForgotPass']);
Route::get('password/reset/{id}/{token}', ['as' => 'reset.link', 'uses' =>'AuthController@resetToken']);
Route::get('projects_working',['as' => 'projectsWorking', 'uses' => 'ProjectController@working']);
Route::get('projects_archieve',['as' => 'projectsArchieve', 'uses' => 'ProjectController@archievedProjects']);
Route::get('archive_a_project/{project_id}',['as' => 'archive_a_project', 'uses' => 'ProjectController@archive_a_project']);
Route::delete('archive_project/{project_id}',['as' => 'archive_project', 'uses' => 'ProjectController@archiveProjectDeletion']);
Route::get('export/{project_id}',['as' => 'export', 'uses' => 'ProjectController@export']);
Route::post('changeProjectManager/{project_id}',['as' => 'changeProjectManager', 'uses' => 'ProjectController@changeProjectManager']);
Route::post('change_pm_delete_user/{user_id}',['as' => 'change_pm_delete_user', 'uses' => 'ProjectController@change_pm_delete_user']);
Route::post('change_design_lead/{project_id}',['as' => 'changeDesignLead', 'uses' => 'ProjectController@changeDesignLead']);
Route::resource('projects', 'ProjectController');

Route::post('per_page_projects', ['as' => 'per_page_projects', 'uses' =>'ProjectController@index']);

/* Dashboard and user routes*/
Route::get('dashboard', ['as' => 'dashboard', 'uses' =>'UserController@dashboard']);
Route::resource('users', 'UserController');
Route::get('user_delete/{user_id}', ['as' => 'userDelete', 'uses'=>'UserController@user_delete']);

// Work Flow
Route::get('workflow', ['as' => 'workflow', 'uses' =>'WorkFlowController@index']);
Route::get('brief/{id}', ['as' => 'brief', 'uses' =>'WorkFlowController@briefProject']);
Route::get('clientBrief/{id}', ['as' => 'clientBrief', 'uses' =>'WorkFlowController@clientBriefProject']);
Route::get('briefProjectStatus/{work_id}', ['as' => 'briefProjectStatus', 'uses' =>'WorkFlowController@briefProjectStatus']);
Route::get('clientReview/{id}/{work_status}', ['as' => 'clientReview', 'uses' =>'WorkFlowController@cleintReviewProject']);
Route::patch('clientReview/{id}/edit', ['as' => 'clientReview/edit', 'uses' =>'WorkFlowController@cleintReviewProjectUpdate']);
Route::get('re-brief/{id}', ['as' => 'reBrief', 'uses' =>'WorkFlowController@reBriefProject']);
Route::post('brief/{id}', ['as' => 'briefSubmit', 'uses' =>'WorkFlowController@briefSubmit']);
Route::get('review/{id}', ['as' => 'review', 'uses' =>'WorkFlowController@reviewProject']);
Route::post('review/{id}', ['as' => 'reviewSubmit', 'uses' =>'WorkFlowController@reviewSubmit']);
Route::get('client-feedback/{id}', ['as' => 'clientFeedback', 'uses' =>'WorkFlowController@clientFeedbackProject']);
Route::post('client-feedback/{id}', ['as' => 'clientFeedback', 'uses' =>'WorkFlowController@clientFeedbackSubmit']);
Route::get('close-project/{id}', ['as' => 'closeProject', 'uses' =>'WorkFlowController@closeProject']);
Route::get('workflowDynamic', ['as' => 'workflowDynamic', 'uses' =>'WorkFlowController@workflowDynamic']);
Route::post('postToWorking', ['as' => 'postToWorking', 'uses' =>'WorkFlowController@toWorking']);
Route::post('toQueue', ['as' => 'toQueue', 'uses' =>'WorkFlowController@toQueue']);
Route::post('studio-to-client', ['as' => 'studioToClient', 'uses' =>'WorkFlowController@studioToClient']);
Route::get('toClient/{project_id}', ['as' => 'toClient', 'uses' =>'WorkFlowController@studioFeedbackToClient']);
Route::get('toArchive/{project_id}', ['as' => 'toArchive', 'uses' =>'WorkFlowController@toArchive']);
Route::get('project_completed/{project_id}', ['as' => 'projectCompleted', 'uses' =>'WorkFlowController@projectCompleted']);
Route::post('client-to-studio', ['as' => 'clientToStudio', 'uses' =>'WorkFlowController@clientToStudio']);
Route::post('works/{id}', ['as' => 'works.update', 'uses' =>'WorkFlowController@update']);
Route::get('brief_edit/{work_id}', ['as' => 'toEditBrief', 'uses' =>'WorkFlowController@brief_edit']);
Route::get('delete_brief/{work_id}', ['as' => 'toDeleteBrief', 'uses' =>'WorkFlowController@brief_delete']);

// Routes for Leaves
Route::post('leave_info{user_id}', ['as' => 'leaveInfo', 'uses' =>'LeaveInfoController@save_leave_info']);
Route::get('leave_info_export{user_id}', ['as' => 'leaveInfoExport', 'uses' =>'LeaveInfoController@leave_info_export']);
Route::get('add_leave_form{user_id}', ['as' => 'addLeaveForm', 'uses' =>'LeaveInfoController@add_leave_form']);
Route::get('show_leave_info{user_id}', ['as' => 'showLeaveInfo', 'uses' =>'LeaveInfoController@show_leave_info']);
Route::get('remove_a_leave{leave_id}', ['as' => 'removeLeave', 'uses' =>'LeaveInfoController@remove_a_leave']);

Route::post('update_brief/{work_id}', ['as' => 'editBrief', 'uses' => 'WorkController@brief_update']);
Route::get('projectStatusChange/{id}/{project_id}/{user_id}/{brief_number}', ['as' => 'projectStatusChange', 'uses' =>'WorkController@update']);
Route::post('workLogStore/{id}/{project_id}/{user_id}', ['as' => 'workLogStore', 'uses' =>'WorkLogController@store']);
Route::post('toProjectDone/{id}/{project_id}/{user_id}/{brief_number}', ['as' => 'toProjectDone', 'uses' =>'WorkController@projectToDone']);
Route::post('cleientBriefCreate/{project_id}', ['as' => 'cleientBriefCreate', 'uses' =>'WorkController@store']);
Route::get('project_leader/{user_id}', ['as' => 'project_leader', 'uses' =>'ProjectController@getLeaderProjects']);
Route::resource('works', 'WorkController');

// Designer Workflow
Route::get('designer', ['as' => 'designer.workflow', 'uses' =>'WorkFlowController@index']);
Route::get('weeklyworkflow', ['as' => 'weeklyWorkflow', 'uses' =>'WorkFlowController@weeklyWorkflow']);
Route::get('weeklyWorkflowDynamicContent', ['as' => 'weeklyWorkflowDynamicContent', 'uses' =>'WorkFlowController@weeklyWorkflowDynamicContent']);
Route::get('work-status/{id}', ['as' => 'designer.workstatus', 'uses' =>'DesignerWorkFlowController@worksStatusChanger']);


// Route::get('user_registration',function(){
// 	$credentials = [
// 	    'email'    => 'mainul@gmail.com',
// 	    'password' => '11309011',
// 	];

// 	$user = Sentinel::registerAndActivate($credentials);

// 	// $new_user = Sentinel::findById($user->id);
// 	// $activation = Activation::create($user);

// 	$user = Sentinel::findById($user->id);

// 	$role = Sentinel::findRoleByName('Super User');

// 	$role->users()->attach($user);

// });


// Route::get('user_deactivate', function(){
// 	$user = Sentinel::findById(24);
// 	Activation::remove($user);
// });


// Route::get('user_activate', function(){
// 	$user = Sentinel::findById(24);
// 	$activation = Activation::create($user);
// });

