<?php echo $this -> Session -> flash(); ?>
<div class="notices form">
<?php echo $this->Form->create('Notice'); ?>
	<fieldset>
		<legend><?php echo __('Add Notice'); ?></legend>
	<?php
		echo $this->Form->input('msg_order',array(
		  'label' => 'Order'));
		echo $this->Form->input('msg_body',array('label' => 'Message','style' => 'width: 400px; Padding:6px;height:50px;','type' => 'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?></li>
	</ul>
</div>
