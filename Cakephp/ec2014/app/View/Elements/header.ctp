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


<div id="templatemo_header_wrapper" >


	 
 <div class="logo"> 

       

        	
          <div id="admin"> 
            	
           <ul class="logout_style">
               <li> <?php 
            if($userID == ""){
                echo $this->Html->link('Login', array('plugin'=>'authake','controller' => 'User', 'action' => 'login'));
            }
            else {
                echo $this->Html->link('[ '.$userID.' ] - Logout ', array('plugin'=>'authake','controller' => 'User', 'action' => 'logout'));
            }
             
            
            ?></li>   
            </div>
        	
        	<?php echo $this->Html->image('/css/images/header5.png', array('style' => 'width: 100%;  margin: 0px; padding: 0px;')); ?> 
        

       
       

            
 </div>
</div> <!-- end of header wrapper -->