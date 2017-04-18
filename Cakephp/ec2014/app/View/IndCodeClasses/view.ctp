<div class="indCodeClasses view">
<h2><?php  echo __('Ind Code Class'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($indCodeClass['IndCodeClass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ind Code Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($indCodeClass['IndCodeGroup']['group_code'], array('controller' => 'IndCodeGroups', 'action' => 'view', $indCodeClass['IndCodeGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Code'); ?></dt>
		<dd>
			<?php echo h($indCodeClass['IndCodeClass']['class_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Code Desc Bng'); ?></dt>
		<dd>
			<?php echo h($indCodeClass['IndCodeClass']['class_code_desc_bng']); ?>
			&nbsp;
		</dd>
		</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ind Code Class'), array('action' => 'edit', $indCodeClass['IndCodeClass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ind Code Class'), array('action' => 'delete', $indCodeClass['IndCodeClass']['id']), null, __('Are you sure you want to delete # %s?', $indCodeClass['IndCodeClass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ind Code Classes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Class'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('controller' => 'IndCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
