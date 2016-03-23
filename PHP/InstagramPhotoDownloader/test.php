<?php 
	
	printImages($userID,$accessToken){ 
	$url = 'https://api.instagram.com/v1/users/'. $userID .'/media/recent?access_token='. $accessToken .'&count=5'; 
	$instagramInfo = connectToInstagram($url); $results = json_decode($instagramInfo, true); //parse through results 
	foreach($results['data'] as $item){ 
		$image_url = $item['images']['low_resolution']['url']; echo '<img src="'.$image_url.'" /> <br/>'; 
		savePicture($image_url); 
	}}
		//Save the Picturefunction savePicture($image_url){ echo $image_url . '<br />'; $filename = basename($image_url); echo $filename . '<br />'; //SELECT * FROM pics WHERE filename=$filename ---- if no matches, continue $destination = imageDirectory.$filename; file_put_contents($destination, file_get_contents($image_url));}//Get user code and save info to session variablesif(isset($_GET['code'])){ $code = $_GET['code']; $url = "https://api.instagram.com/oauth/access_token"; $access_token_settings = array( 'client_id'                =>     clientID, 'client_secret'            =>     clientSecret, 'grant_type'               =>     'authorization_code', 'redirect_uri'             =>     redirectURI, 'code'                     =>     $code ); $curl = curl_init($url);     //we need to transfer some data curl_setopt($curl,CURLOPT_POST,true);   //using POST curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_settings);   //use these settings curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   //return results as string curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   //don't need to verify any certificates $result = curl_exec($curl);   //go get the data! curl_close($curl);   //close connection to free up your resources $results = json_decode($result,true); $userName = $results['user']['username'];        $userID = $results['user']['id'];        $accessToken = $results['access_token']; printImages($userID,$accessToken); }else{ ?><!doctype html><html lang="en"><body> <!-- When they click this, they will be prompted to Login to Instagram --> <a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login</a></body></html><?php}  ?>


 ?>