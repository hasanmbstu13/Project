<?php 
function _fetch_book($conn)
	{
		$this->loadModel('Book');
		$this->loadModel('QuesServer');
		$this->loadModel('Authake.User');
		
		$user_id = $this->Session->read('Authake.id');
		
		$users = $this->User->find('all', array(
				'conditions' => array(
					'User.id' => $user_id
				)));
		$users = $users[0];
		
		$msg = "";
		$msg .= "<h2>Fetching Data From Server: </h2>";
		
		
		
		
		
		$serverBooks = $this->BookServer->find('all');
		
		foreach ($serverBooks as $key => $value) {
			$insert_book['Book'] = $value['BookServer'];
			pr($insert_book);
		}
		
	}

?>