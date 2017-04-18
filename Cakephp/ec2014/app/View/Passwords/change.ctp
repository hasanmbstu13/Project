<?php echo $this -> Session -> flash(); ?>
<?php echo $this->Form->create('Password'); ?>
	<fieldset>
 		<legend>Change Your Password</legend>
	<?php
		
		echo $this->Form->input('pass1', array('size'=>'40', 'type'=>'password', 'label' => 'New Password'));
		echo $this->Form->input('pass2', array('size'=>'40', 'type'=>'password', 'label' => 'Confirm Password'));
	?>
	</fieldset>
</br>
<?php echo $this->Form->end(__('Confirm'));?>
