<?php


App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $components = array(
	

        'Session',

        'Export.Export',

        'Auth' => array(

            'authenticate' => array(

            'Form' => array(

                'fields' => array('username' => 'username'),

                'passwordHasher' => 'Blowfish',

				'scope' => array('User.status' => 1)

                )

            ),

          'authorize' => array('Controller'),

          'unauthorizedRedirect' => '/admin/users/login'

        )

    
	);
	
	 public $path = 'http://www.pikdish.com/admin/';
	 public $restro_path = 'http://www.pikdish.com/restaurant/';
	 public $restrologo= "http://www.pikdish.com/restaurant/restrologo/";
	 public $ads_img = "http://www.pikdish.com/admin/userplanimg/";
	 
	 public function isAuthorized($user) 
	 {
		
        $user_role = $user['user_type'];
		
        if($user_role == 0) {
         $role = "Administrator";
		 
		} elseif($user_role == 1) {
			$role = "Member";
		}else{
			$role = "User";
		}

    

        // Every logged user can reach the index.
        if($this->action === 'display') return true;



        // Admin can access every action

        if ( $role === 'Administrator' || $role==="Member") {
            return true;
        }



       // Default deny

        return false;

    }
	 
	 
	 public function beforeFilter() 
	 {
		 $path="http://www.pikdish.com/admin/";
		 $this->set('path',"http://www.pikdish.com/admin/");
         $this->set('imgpath','http://www.pikdish.com/admin/img/');
		 $this->set('userimg','http://www.pikdish.com/admin/userpic/');
		 $this->set('adsimg','http://www.pikdish.com/admin/userplanimg/');
		 $this->set('ownerimg','http://www.pikdish.com/restaurant/ownerpic/');
		 $this->set('restrologo','http://www.pikdish.com/restaurant/restrologo/');
		 
		 $this->loadModel('User');
		 $options = array('conditions' => array('User.id' => AuthComponent::user('id')));
		 $userArr = $this->User->find('first', $options);
		 $this->set('userArr',$userArr);  
		 
		 $this->loadModel('Setting');
		 $options = array('conditions' => array('Setting.id' => 1));
		 $settings = $this->Setting->find('first', $options);
		 $this->set('settings',$settings);  
		 
		 
		 		 
	 }
	 
	 
	 
	
}
