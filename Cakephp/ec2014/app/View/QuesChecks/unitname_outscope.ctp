<?php echo $this->Session->flash(); ?>
<div id="new_book">
<?php echo $this->Html->link(__('BACK TO UPAZILA'), array(
'controller' => 'QuesChecks',
'action' => 'qall_upazila_outscope')); ?>
</div>
<br>
<fieldset>
                <legend><?php  echo 'ইউনিয়ন&nbsp;/&nbsp;ওয়ার্ড&nbsp;:&nbsp;' .$upazilaName; ?></legend>


	
<div class="actions">
	<?php
			
			foreach ($unionNames as $key => $unionName) {

			echo ($key+1).". ".$this->Html->link($unionName['GeoCodeUnion']['union_name'], array('controller' => 'QuesChecks', 'action' => 'books_outscope', $unionName['GeoCodeUnion']['id'], $upazilaID));
				echo "<br />";
			}


	?>
</div>

</fieldset>
<br />