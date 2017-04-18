<style>
	a.redStatus {
		color: red;
	}
</style>
<?php echo $this->Session->flash(); ?>

<div id="new_book">
<?php echo $this->Html->link(__('BACK TO UNION / WARD'), array(
'controller' => 'QuesChecks',
'action' => 'unitname_outscope', $upazilaID)); ?>
</div>
<br />

<fieldset>
        <legend>বই&nbsp;এর&nbsp;তালিকা</legend>
	
<div class="actions">
	<?php
			
			foreach ($books as $key => $book) {

			echo ($key+1).". ".$this->Html->link($book['Book']['id']." (".$book['Book']['status'].")", array('controller' => 'QuesChecks', 'action' => 'questions_outscope', $book['Book']['id']), array('class' => $book['Book']['status'] == "Pending"?'redStatus':""));
				echo "<br />";
			}


	?>
</div>
</fieldset>
<br />