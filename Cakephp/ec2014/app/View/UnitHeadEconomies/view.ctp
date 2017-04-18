<?php echo $this->Session->flash(); ?>
<div class="unitHeadEconomies view">
<h2><?php  echo __('Unit Head Economy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unitHeadEconomy['UnitHeadEconomy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Economy Code'); ?></dt>
		<dd>
			<?php echo h($unitHeadEconomy['UnitHeadEconomy']['economy_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Economy Desc Eng'); ?></dt>
		<dd>
			<?php echo h($unitHeadEconomy['UnitHeadEconomy']['economy_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Economy Desc Bng'); ?></dt>
		<dd>
			<?php echo h($unitHeadEconomy['UnitHeadEconomy']['economy_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unit Head Economy'), array('action' => 'edit', $unitHeadEconomy['UnitHeadEconomy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unit Head Economy'), array('action' => 'delete', $unitHeadEconomy['UnitHeadEconomy']['id']), null, __('Are you sure you want to delete # %s?', $unitHeadEconomy['UnitHeadEconomy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Head Economies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Head Economy'), array('action' => 'add')); ?> </li>
	</ul>
</div>
