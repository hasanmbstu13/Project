<?php
if(isset($_SESSION['MenuActive'])){ 

}else{
    $_SESSION["MenuActive"] = "0";
}

?>


<div id="templatemo_menu_wrapper">   
    <div id="templatemo_menu">
        <ul>
           <!--  <li><a href="#" class="current">Home</a></li> -->

            <li><?php echo $this->Html->link('হোম',array('plugin' => '', 'controller' => 'Pages', 'action' => 'index'), array('class' => $_SESSION["MenuActive"]==1?'current':"")); ?></li>

		
       
            
        </ul>    	
    </div> <!-- end of menu -->
</div> <!-- end of menu wrapper -->