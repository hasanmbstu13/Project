<?php
   	
  // var_dump($data); 
  // var_dump($_POST);
  // var_dump($_FILES);
  // exit;

  if(isset($_FILES['image']['type'])){
  	$validextentions = array('jpeg', 'jpg', 'png', 'gif', 'tiff');
  	$temporary = explode(".", $_FILES['image']['name']);
  	$file_extention = end($temporary);

  	if ((($_FILES["image"]["type"] == "image/png") 
  		|| ($_FILES["image"]["type"] == "image/jpg") 
  		|| ($_FILES["image"]["type"] == "image/jpeg")
  		|| ($_FILES["image"]["type"] == "image/gif")
  		|| ($_FILES["image"]["type"] == "image/tiff")
  		) && in_array($file_extention, $validextentions)
  	   ){
  	   	 $priv = 0777;
  	   	 $imagpath = 'uploads';
  		 if(!@mkdir($imagpath))
  		 {
  			@mkdir($imagpath, $priv) ? true : false; // creates a new directory with write permission.
  		 } 

  		 // // Determine the target_path
  		 // $target_path = SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->filename;

  		 // // Make sure a file doesn't already exist in the target location
  		 // if(file_exists($target_path)) {
  		 // 	$this->errors[] = "The file {$this->filename} already exists.";
  		 // 	return false;
  		 // }

  		 $filepath = $imagpath."/".$_FILES['image']['name'];
  		 $temppath = $_FILES['image']['tmp_name'];
  		 // Attempt to move the file
  		 if(move_uploaded_file($temppath, $filepath)) {
  		 	$image = $_FILES['image']['name'];
  		 }
  		 	
  		 // } else {
  		 // 	// File was not moved.
  		 // 	$this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
  		 // 	return false;
  		 // }
  	}

  }

   $myFile = "Hashtags.json";
   $arr_data = array(); // create empty array

  try
  {
	   //Get form data
	   $formdata = array(
	      'category'=> $_POST['category'],
	      'hashtag_title'=> $_POST['hashtag_title'],
	      'hashtag'=>$_POST['hashtag'],
	      'image_url'=> $_POST['image_url'],
	      'image' => $image
	   );

	   //Get data from existing json file
	   $jsondata = file_get_contents($myFile);

	   // converts json data into array
	   $arr_data = json_decode($jsondata, true);

	   // Push user data to array
	   array_push($arr_data,$formdata);

       //Convert updated array to JSON
	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents($myFile, $jsondata)) {
	        echo 'Data successfully saved';
	    }
	   else 
	        echo "error";

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

?>