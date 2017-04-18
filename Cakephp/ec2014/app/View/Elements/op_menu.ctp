<?php
if (isset($_SESSION['MenuActive'])) {

} else {
	$_SESSION["MenuActive"] = "0";
}
if (isset($_SESSION['Authake']['login'])) {
	$userID = $_SESSION['Authake']['login'];
} else {
	$userID = "";
}
?>

<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
		<ul>
			<!--  <li><a href="#" class="current">Home</a></li> -->

			<li>
				<?php echo $this -> Html -> link('হোম', array('plugin' => '', 'controller' => 'Pages', 'action' => 'index'), array('class' => $_SESSION["MenuActive"] == 1 ? 'current' : "")); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('প্রশ্নপত্র', array('plugin' => '', 'controller' => 'Questionaires', 'action' => 'add'), array('class' => $_SESSION["MenuActive"] == 2 ? 'current' : "")); ?>
			</li>

			

			<li>
				<?php echo $this -> Html -> link('ড্যাশবোর্ড', array('plugin' => '', 'controller' => 'Pages', 'action' => 'dashboard'), array('class' => $_SESSION["MenuActive"] == 5 ? 'current' : "")); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('কোডের তালিকা', array('plugin' => '', 'controller' => 'Geos', 'action' => 'index'), array('class' => $_SESSION["MenuActive"] == 7 ? 'current' : "")); ?>
			</li> 
			
 
			<li>
				<?php echo $this -> Html -> link('নির্দেশিকা', array('plugin' => '', 'controller' => 'Pages', 'action' => 'help_pdf'), array('class' => $_SESSION["MenuActive"] == 6 ? 'current' : "", 'target' => '_blank')); ?>
			</li>
			
			                  <li>
                <?php echo $this -> Html -> link('বই বিতরণ ফর্ম', array('plugin' => '', 'controller' => 'Pages', 'action' => 'book_distribution'), array('class' => $_SESSION["MenuActive"] == 8 ? 'current' : "", 'target' => '_blank')); ?>
            </li>


		</ul>
	</div>
	<!-- end of menu -->
</div>
<!-- end of menu wrapper -->