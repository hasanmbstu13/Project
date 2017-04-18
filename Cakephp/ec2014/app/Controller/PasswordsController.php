<?php
App::uses('AppController', 'Controller');

class PasswordsController extends AppController {

	public function change() {

		if ($this -> request -> is('post')) {
			
			if ($this -> request -> data['Password']['pass1'] != $this -> request -> data['Password']['pass2']) {
				$this -> Session -> setFlash(__('Password does not match. Please, try again.'));
				$this -> redirect(array('controller' => 'Pages', 'action' => 'index'));
			}

			$this -> loadModel('Authake.User');
			$user_id = $this -> Session -> read('Authake.id');

			$update = array('Password' => array('id' => $user_id, 'password' => md5($this -> request -> data['Password']['pass1'])));

			if ($this -> Password -> save($update)) {
				$this -> Session -> setFlash(__('The New Password has been updated'));
				$this -> redirect(array('controller' => 'Pages', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The Password could not be saved. Please, try again.'));
				$this -> redirect(array('controller' => 'Pages', 'action' => 'index'));
			}
		} else {
			//$this -> request -> data = $this -> Password -> read(null, $id);
		}
	}

}
