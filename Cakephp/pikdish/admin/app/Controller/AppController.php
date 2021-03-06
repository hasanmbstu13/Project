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

        ),

        'Export.Export'

    
	);
	
	 public $path = '/pikdish/admin/';
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
			$role = "";
		}
		

    

        // Every logged user can reach the index.
         
        if($this->action === 'display') return true;



        // Admin can access every action

        if ($role === 'Administrator' || $role==="Member") {

            return true;

        }

       
	   
       $this->Auth->logout();
       // Default deny

        return false;

    }
	 
	 
	 public function beforeFilter() 
	 {
		 $path="http://".$_SERVER['HTTP_HOST']."/pikdish/admin/";
		 $this->set('path',"http://".$_SERVER['HTTP_HOST']."/pikdish/admin/");
         $this->set('imgpath','/pikdish/admin/img/');
		 $this->set('userimg','/pikdish/admin/userpic/');
		 $this->set('ownerimg','/pikdish/restaurant/ownerpic/');
		 $this->set('restrologo','/pikdish/restaurant/restrologo/');
		 
		 
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
