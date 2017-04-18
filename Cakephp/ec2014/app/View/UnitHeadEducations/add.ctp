<?php echo $this->Session->flash(); ?>
<div class="unitHeadEducations form">
<?php echo $this->Form->create('UnitHeadEducation'); ?>
	<fieldset>
		<legend><?php echo __('Add Unit Head Education'); ?></legend>
	<?php
		echo $this->Form->input('education_code');
		echo $this->Form->input('education_desc_eng');
		echo $this->Form->input('education_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Unit Head Educations'), array('action' => 'index')); ?></li>
	</ul>
</div>
