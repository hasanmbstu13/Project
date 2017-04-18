<?php 
if(isset($_SESSION['Authake']['login']))
{
    $userID = $_SESSION['Authake']['login'];
}
else {
    $userID = "";
}


?>
<style>
	#bangla ul li
	{
		list-style: none;
		padding-left: 0px;
	}
</style>

<div id="templatemo_header_wrapper">
 <div class="logo"> 
         <?php echo $this->Html->image('/img/logo.png')?>
     <div id="bangla">
            <ul style=" margin-left: -30px">
                <li> <h2>বাংলাদেশ পরিসংখ্যান ব্যুরো</h2></li>
                <li> <h2>অর্থনৈতিক শুমারি ২০১৩</h2></li>
            </ul>
        </div> 
        
            <div id="admin"> 
           <ul class="logout_style">
               <li> <?php 
            if($userID == ""){
                echo $this->Html->link('Login', array(
                'plugin'=>'authake',
                'controller' => 'User', 
                'action' => 'login'));
            }
            else {
                echo $this->Html->link('[ '.$userID.' ] - Logout ', array(
                'plugin'=>'authake',
                'controller' => 'User', 
                'action' => 'logout'));
            }
             
            
            ?></li>   
            </div>
 </div>
</div> <!-- end of header wrapper -->