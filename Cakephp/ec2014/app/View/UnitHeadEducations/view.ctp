<?php echo $this->Session->flash(); ?>
<div class="unitHeadEducations view">
<h2><?php  echo __('Unit Head Education'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unitHeadEducation['UnitHeadEducation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education Code'); ?></dt>
		<dd>
			<?php echo h($unitHeadEducation['UnitHeadEducation']['education_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education Desc Eng'); ?></dt>
		<dd>
			<?php echo h($unitHeadEducation['UnitHeadEducation']['education_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education Desc Bng'); ?></dt>
		<dd>
			<?php echo h($unitHeadEducation['UnitHeadEducation']['education_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unit Head Education'), array('action' => 'edit', $unitHeadEducation['UnitHeadEducation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unit Head Education'), array('action' => 'delete', $unitHeadEducation['UnitHeadEducation']['id']), null, __('Are you sure you want to delete # %s?', $unitHeadEducation['UnitHeadEducation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Head Educations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Head Education'), array('action' => 'add')); ?> </li>
	</ul>
</div>
