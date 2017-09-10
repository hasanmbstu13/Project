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
	
	 public $path = 'http://www.pikdish.com/restaurant/';
	 public $restro_path = 'http://www.pikdish.com/restaurant/';
	 public $restrologo= "http://www.pikdish.com/restaurant/restrologo/";
	 
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
		 $path="http://www.pikdish.com/restaurant/";
		 $this->set('path',"http://www.pikdish.com/restaurant/");
         $this->set('imgpath','http://www.pikdish.com/restaurant/img/');
		 $this->set('userimg','http://www.pikdish.com/restaurant/userpic/');
		 $this->set('ownerimg','http://www.pikdish.com/restaurant/ownerpic/');
		 $this->set('restrologo','http://www.pikdish.com/restaurant/restrologo/');
		  $this->set('admin','http://www.pikdish.com/admin/restaurants/');
		 
		 if($this->Session->check('user_id'))
		 {
		  $this->loadModel('User');
		  $options = array('conditions' => array('User.id' => $this->Session->read('user_id')));
		  $userArr = $this->User->find('first', $options);
		  $this->set('userArr',$userArr);  
		 }
		 
		 $this->loadModel('Setting');
		 $options = array('conditions' => array('Setting.id' => 1));
		 $settings = $this->Setting->find('first', $options);
		 $this->set('settings',$settings);
		 
		 if($this->Session->check('restro_id'))
		 {
		  $this->loadModel('Restaurant');
		  $restro_info = $this->Restaurant->query("select * from om_restaurants as `Restaurant` where id = ".$this->Session->read('restro_id'));
		  $this->set('restro_info',$restro_info[0]);  
		 }
		 
		 
		 		 
	 }
	 
	 
	 
	
}
