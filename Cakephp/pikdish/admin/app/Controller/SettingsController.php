<?php
App::uses('AppController', 'Controller');


class SettingsController extends AppController {



	public function index()
	 {
	   
		$this->loadModel('Setting');
		

		if ($this->request->is('put') || $this->request->is('post')) 
		{      
				if($this->request->data['Setting']['google_mapkey']!="")
				{
				    $this->request->data['Setting']['id'] = 1;
					if ($this->Setting->save($this->request->data))
					 {
						$this->Session->setFlash(__('Setting has been updated successfully'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect('/settings');
					}
					else
					 {
						$this->Session->setFlash(__('Setting could not be updated. Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect('/settings');
					 }
				}
				else
				{
					$this->Session->setFlash(__('Setting could not be updated. Please upload required fields.'), 'default', array('class'=>'alert alert-danger'));
					return $this->redirect('/settings');
				}	
		 }
		 else
		 {
			 
			  $this->loadModel('Country');
		      $countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		      $this->set('countries',$countries);
			 
			  $options = array('conditions' => array('Setting.id'=>1));
			  $this->request->data = $this->Setting->find('first', $options);
			  
			  
				
			  
			
		   } 
	}
	
		

			  
}	
