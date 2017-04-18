<?php echo $this->Session->flash(); ?>
<div class="geoCodeDivns form">
<?php echo $this->Form->create('GeoCodeDivn'); ?>
	<fieldset>
		<legend><?php echo __('Edit Division'); ?></legend>
	<?php
		echo $this->Form->input('id');
    echo $this->Form->input('divn_code',array('empty' => '','label' => 'বিভাগ কোড'));
        echo $this->Form->input('divn_name',array('empty' => '','label' => 'বিভাগ নাম'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		
		<li><?php echo $this->Form->postLink(__('Delete Division'), array('action' => 'delete', $this->Form->value('GeoCodeDivn.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GeoCodeDivn.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Division'), array('action' => 'index')); ?></li>

	</ul>
</div>
