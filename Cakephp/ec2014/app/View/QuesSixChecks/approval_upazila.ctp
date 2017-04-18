<?php echo $this->Session->flash(); ?>

<div id="new_book">
<?php echo $this->Html->link(__('BACK TO DASHBOARD'), array(
'controller' => 'Pages',
'action' => 'dashboard')); ?>
</div>
<br />
<fieldset>
    <legend><?php  echo 'All Upazila of '.$zilas_name; ?></legend>
                
 <div class="actions">
 </br>
	<?php
			foreach ($upazilas as $key => $upazila) {

			echo ($key+1).". ".$this->Html->link($upazila['GeoCodeUpazila']['upzila_name'], array('controller' => 'QuesSixChecks', 'action' => 'approval_unions', $upazila['GeoCodeUpazila']['id']));
				echo "<br />"; 
			}


	?> 


</div>
</fieldset>
<br />