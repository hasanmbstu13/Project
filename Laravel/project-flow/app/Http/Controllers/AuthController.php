<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function home(){
        if ($login = Sentinel::check()) {
            if ($login->inRole('super-user')) {
                return redirect('/dashboard');
            } else if ($login->inRole('project-manager')) {
                return redirect('/workflow');
            } else if ($login->inRole('designer')) {
                return redirect('/designer');
            } else if (!$login->inRole('super-user') || !$login->inRole('project-manager') || !$login->inRole('designer')){
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }

    public function getLogin(){
        return view('welcome');
    }
    public function postLogin(Request $request){
        $input = $request->all();

        $credentials = [
            'email'    =>  $input['email'],
            'password' => $input['password'],
        ];

        if(isset($input['remember'])) {
            $login = Sentinel::authenticateAndRemember($credentials);
        }else{
            $login = Sentinel::authenticate($credentials);
        }

        if($login){
            if($login->inRole('super-user')){
                return redirect('/dashboard');
            }
            else if($login->inRole('project-manager')){
                return redirect('/workflow');
            } 
            else if($login->inRole('designer')){
                return redirect('/designer');
            }else{
                return redirect('/');
            }

        }else{
            return redirect('login');
        }
    }
    public function getLogout(){
        Sentinel::logout();
        return redirect('/');
    }
    public function getRegister(){
    }
    public function postRegister(){
    }

    public function forgotPass(){
        return view('auth.forgotpass');
    }

    public function postForgotPass(Request $request){
        $input = $request->all();

        $user = Sentinel::findByCredentials($input);

        $reminder = Reminder::exists($user) ?: Reminder::create($user);
        $code = $reminder->code;

        $sent = Mail::send('emails.forgotpass', compact('user', 'code'), function($m) use ($user) {
            $m->to($user->email)->subject('Password Reset Link');
        });

        if ($sent === 0) {
            return redirect()->route('auth.register')->withErrors(trans('auth.password.send_fail'));
        }
        return back()->withSuccess('Check Your email for password Reset link');
        //validation will be here
        //return $input;
        // check user and send email
        return view('auth.forgotpass');
    }
    public function resetToken($id,$token){
        $user = Sentinel::findById($id);
        $pass = str_random(10);
        if ($reminder = Reminder::complete($user, $token, $pass))
        {
            $sent = Mail::send('emails.password', compact('user', 'pass'), function($m) use ($user) {
                $m->to($user->email)->subject('New Password!!!');
            });

            echo 'check your Email!!!';
        }
        else
        {
            echo 'Error!!';
        }
    }
}