<?php


App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $components = array(
	

        'Session',

        'Auth' => array(

            'authenticate' => array(

            'Form' => array(

                'fields' => array('username' => 'username'),

                'passwordHasher' => 'Blowfish',

				'scope' => array('User.status' => 1)

                )

            ),

          'authorize' => array('Controller'),

          'unauthorizedRedirect' => '/Pages/unauthorized'

        )

    
	);
	
	 public $path = '/pikdish/restaurant/';
	 public $restro_path = 'http://localhost/pikdish/restaurant/';
	 public $restrologo= "/pikdish/restaurant/restrologo/";
	 
	 
	 public function isAuthorized($user) 
	 {
		
        $user_role = $user['user_type'];
		
        if($user_role == 0)
		{
         $role = "Administrator";
		 
		}elseif($user_role == 1)
		{
			$role = "Member";
		}else
		{
			$role = "Onwer";
		}

    

        // Every logged user can reach the index.
         
        if($this->action === 'display') return true;



        // Admin can access every action

        if ($role === 'Onwer' || $role = "Administrator") {

            return true;

        }



       // Default deny

        return false;

    }
	 
	 
	 public function beforeFilter() 
	 {
		 $path="http://".$_SERVER['HTTP_HOST']."/pikdish/restaurant/";
		 $this->set('path',"http://".$_SERVER['HTTP_HOST']."/pikdish/restaurant/");
         $this->set('imgpath','/pikdish/restaurant/img/');
		 $this->set('userimg','/pikdish/restaurant/ownerpic/');
		 $this->set('ownerimg','/pikdish/restaurant/ownerpic/');
		 $this->set('restrologo','/pikdish/restaurant/restrologo/');
		 $this->set('admin','/pikdish/admin/restaurants/');
		 
		 if($this->Session->check('user_id'))
		 {
		  $this->loadModel('User');
		  $options = array('conditions' => array('User.id' => $this->Session->read('user_id')));
		  $userArr = $this->User->find('first', $options);
		  $this->set('userArr',$userArr);  
		 }
		 else
		 {
			 //$this->Auth->logout();
		     // redirect to the home
	         //return $this->redirect('/');
		 }
		 
		 $this->loadModel('Setting');
		 $options = array('conditions' => array('Setting.id' => 1));
		 $settings = $this->Setting->find('first', $options);
		 $this->set('settings',$settings);
		 
		 if($this->Session->check('restro_id'))
		 {
		  $this->loadModel('Restaurant');
		  $restro_info = $this->Restaurant->find("first",array("recursive"=>2,"conditions"=>array("Restaurant.id" => $this->Session->read('restro_id'))));
		  $this->set('restro_info',$restro_info);  
		 }
		 
		 
		 
		 		 
	 }
	 
	 
	 
	
}
