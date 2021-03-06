<?PHP
App::uses('AppController','Controller');
class UsersController extends AppController
{
	public function beforeFilter()
	{
	    parent::beforeFilter();

	    // Allow users to register and logout. This makes this request public (no login needed)
	   	$this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password','register','activate');
	}


	public function isAuthorized($user)
	{

	  return parent::isAuthorized($user);
		 return true;
	}

	 public function login()
	 {

		// we don't want layout on the login page.
		$this->layout='empty';


    if ($this->Auth->login())
		{

      //print_r($this->request->data);
		  //exit;

		  $role = AuthComponent::user('user_type');

		  $redirect_url = $this->Auth->redirect();

   		if($role=='0'){
   			//return $this->redirect("http://localhost/pikdish/admin/restaurants");
   			return $this->redirect( '/' );
			}else if($role=='1'){
   			//return $this->redirect("http://localhost/pikdish/admin/restaurants");
   			return $this->redirect( '/' );
			}else if($role=='2'){
   			//return $this->redirect("/users/tmp");
   			return $this->redirect( array('controller' => 'users', 'action' => 'tmp') );
			}else{
				$this->Session->setFlash(__('Invalid username or password, try again'), 'default', array('class'=>'alert alert-danger'));
				//return $this->redirect("/users/logout");
				return $this->redirect( array('controller' => 'users', 'action' => 'logout') );
			}

    } else if ($this->request->is('post')){
        $this->Session->setFlash(__('Invalid username or password, try again'), 'default', array('class'=>'alert alert-danger'));
    }

	}

	public function logout() {

		// logout
		$this->Auth->logout();
		// redirect to the home
	    return $this->redirect('/');
	}

   public function tmp()
   {
	     $this->loadModel('Restaurant');
		 $restro;
	     if($this->request->is('put')||$this->request->is('post'))
		 {
		   $restro = $this->Restaurant->find("first",array("fields"=>array("Restaurant.id,Restaurant.user_id"),"conditions"=>array('Restaurant.id'=>$this->request->data['restro_id'])));

		 }
		 else
		 {

			 $restro = $this->Restaurant->find("first",array("fields"=>array("Restaurant.id,Restaurant.user_id"),"conditions"=>array('Restaurant.user_id'=>AuthComponent::user('id'))));

		 }
		     $this->Session->delete('restro_id');
		     $this->Session->write('restro_id',$restro['Restaurant']['id']);
			 $this->Session->delete('user_id');
		     $this->Session->write('user_id',$restro['Restaurant']['user_id']);
		     return $this->redirect("/orders/grid_view");
   }

	public function index()
	{
		//echo $this->Session->read('restro_id');
		//exit;
	}

	public function getState($id)
	{
		$this->loadModel('State');
		$states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$id)));
		$options="";
		foreach($states as $id=>$name)
		{
			$options.="<option value='$id'>$name</option>";


		}
		echo $options;
		exit;
	}
	public function getCity($id)
	{
		$this->loadModel('City');
		$states=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$id)));
		$options="";
		foreach($states as $id=>$name)
		{
			$options.="<option value='$id'>$name</option>";


		}
		echo $options;
		exit;
	}

    public function change_password()
	{

		 $this->loadModel('User');

		 if($this->request->is('post'))
		 {
		    $data=$this->request->data;
			$data['User']['id']=$this->Session->read('user_id');
			$this->User->create();
			$this->User->save($data);
			if ($this->User->save($data))
			{

						$this->Session->setFlash(__('Your password have been updated.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'change_password' ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'change_password' ));
			}


		 }





	}

    public function profile()
	{
		 $this->loadModel('User');
		 if($this->request->is('put') || $this->request->is('post'))
		 {
		    $data=$this->request->data;

			$data["User"]["dob"]= date('Y-m-d',strtotime($data["User"]["dob"]));
			$user_pix=$this->User->find('first',array('fields'=>array('user_pic'),"conditions"=>array("User.id"=>$data['User']['id'])));
			$photoVal=$this->uploadImage('ownerpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'user');

		 	if($photoVal!='Error'){
				@unlink('ownerpic'.$user_pix['User']['user_pic']);

				$data["User"]["user_pic"] = $photoVal;
			}else{
				unset($data["User"]["user_pic"]);
			}


			//echo ($data["User"]["dob"]);
			//exit;
			if($data["User"]["anniversary_date"]!="")
			{
				$data["User"]["anniversary_date"]= date('Y-m-d',strtotime($data["User"]["anniversary_date"]));
			}else
			{
				unset($data["User"]["anniversary_date"]);
			}
			//print_r($data);
			//exit;
			$this->User->create();

			if ($this->User->save($data))
			{

						$this->Session->setFlash(__('Your profile have been updated.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'profile'));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'profile' ));
			}


		 }
		 else
		 {


		  $id=$this->Session->read('user_id');

		  $this->loadModel('Country');
		  $countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		  $this->set('countries',$countries);


		  $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		  $this->request->data = $this->User->find('first', $options);

		  $this->request->data['User']['dob'] = date('d-m-Y',strtotime($this->request->data['User']['dob']));
		  if($this->request->data['User']['anniversary_date'] !== "")
		  { $this->request->data['User']['anniversary_date'] = date('d-m-Y',strtotime($this->request->data['User']['anniversary_date']));}

	      $this->loadModel('State');
		  $states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$this->request->data['User']['country_id'])));
		  $this->set('states',$states);
		  $this->loadModel('City');
		  $cities=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$this->request->data['User']['state_id'])));
		  $this->set('cities',$cities);

		}



}

	public function checkUser($email)
	{
		$this->loadModel('User');
		$this->loadModel('Restaurant');
		$user=$this->User->find('list',array("conditions"=>array(
		"or"=>array(
		"username"=>$email,
		"email"=>$email
		)
		)));
		$re_mail = $this->Restaurant->find('list',array('conditions'=>array('email'=>$email)));
		if($user!=null || $re_mail!=null)
		{
			 $data = Array(
	            "message" => "Username already exists. Please specify a different username.",
	            "status" => "error"
            );
		}
			else
			{
				$data = Array(
	            "message" => "This username is available",
	            "status" => "ok"
            );
			}
			echo json_encode($data);
			exit;
		}


		public function checkmobile($mobile)
	   {
		 $this->loadModel('User');
		 $this->loadModel('Restaurant');

	    $user=$this->User->find('list',array("conditions"=>array("mobile_no"=>$mobile)));
		$re_mobile = $this->Restaurant->find('list',array('conditions'=>array('mobile_no'=>$mobile)));

		 if($user!=null || $re_mobile != null)
		 {
			 $data = Array(
	            "message" => "This mobile no is already used. Please specify a different mobile no.",
	            "status" => "error"
            );
		 }
			else
			{
				$data = Array(
	            "message" => "This mobile no is available",
	            "status" => "ok"
            );
			}
			echo json_encode($data);
			exit;
		}





		function uploadImage($directory,$imageName,$tempName,$fileType,$changeImageName)
	   {
		 $priv = 0777;
		 $imagpath = $directory;
		 if(!@mkdir($imagpath))
		 {
			@mkdir($imagpath, $priv) ? true : false; // creates a new directory with write permission.
		 }

		 $numberArr = array(0,1,2,3,4,5,6,7,8,9);
		 $fileName = explode(".",$imageName);
		 if(!empty($imageName)  && (($fileType == "image/gif")
			|| ($fileType == "image/jpeg")
			|| ($fileType == "image/pjpeg")
			|| ($fileType == "image/png")))
		  {
				$randname = $changeImageName;

				$time = time();
				if($fileName[1]=='gif' || $fileName[1]=='jpeg' || $fileName[1]=='pjpeg' || $fileName[1]=='png'){
					$photoname = strtolower($randname)."_".$time.".".$fileName[1];
				}else{
					$photoname = strtolower($randname)."_".$time.".png";
				}
				$photoname = str_replace("-"," ",$photoname);
				$filepath = $imagpath."/".$photoname;
				$small_filepath = $imagpath."/"."small_".$photoname;
				if(move_uploaded_file($tempName,$filepath))
				{
					//$this->Image->resize_img($filepath,125, $small_filepath);
					return $photoname;
					die;
				}
				else
				{
					return "Error";
					die;
				}
		  }
		  else
		  {
			return "Error";
					die;
		 }
	 }

}

?>