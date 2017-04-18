<div class="indCodeGroups view">
	<h2><?php echo __('Ind Code Group'); ?></h2>
	<dl>
		<dt>
			<?php echo __('Id'); ?>
		</dt>
		<dd>
			<?php echo h($indCodeGroup['IndCodeGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Ind Code Divn'); ?>
		</dt>
		<dd>
			<?php echo $this -> Html -> link($indCodeGroup['IndCodeDivn']['divn_code'], array('controller' => 'IndCodeDivns', 'action' => 'view', $indCodeGroup['IndCodeDivn']['id'])); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Group Code'); ?>
		</dt>
		<dd>
			<?php echo h($indCodeGroup['IndCodeGroup']['group_code']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Group Code Desc Bng'); ?>
		</dt>
		<dd>
			<?php echo h($indCodeGroup['IndCodeGroup']['group_code_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Edit Ind Code Group'), array('action' => 'edit', $indCodeGroup['IndCodeGroup']['id'])); ?>
		</li>
		<li>
			<?php echo $this -> Form -> postLink(__('Delete Ind Code Group'), array('action' => 'delete', $indCodeGroup['IndCodeGroup']['id']), null, __('Are you sure you want to delete # %s?', $indCodeGroup['IndCodeGroup']['id'])); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('List Ind Code Groups'), array('action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('New Ind Code Group'), array('action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('List Ind Code Divns'), array('controller' => 'IndCodeDivns', 'action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('New Ind Code Divn'), array('controller' => 'IndCodeDivns', 'action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('List Ind Code Classes'), array('controller' => 'IndCodeClasses', 'action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('New Ind Code Class'), array('controller' => 'IndCodeClasses', 'action' => 'add')); ?>
		</li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ind Code Classes'); ?></h3>
	<?php if (!empty($indCodeGroup['IndCodeClass'])):
	?>
	<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Ind Code Group Id'); ?></th>
			<th><?php echo __('Class Code'); ?></th>
			<th><?php echo __('Class Code Desc Bng'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
$i = 0;
foreach ($indCodeGroup['IndCodeClass'] as $indCodeClass):
		?>
		<tr>
			<td><?php echo $indCodeClass['id']; ?></td>
			<td><?php echo $indCodeClass['ind_code_group_id']; ?></td>
			<td><?php echo $indCodeClass['class_code']; ?></td>
			<td><?php echo $indCodeClass['class_code_desc_bng']; ?></td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('controller' => 'IndCodeClasses', 'action' => 'view', $indCodeClass['id'])); ?>
			<?php echo $this -> Html -> link(__('Edit'), array('controller' => 'IndCodeClasses', 'action' => 'edit', $indCodeClass['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('controller' => 'IndCodeClasses', 'action' => 'delete', $indCodeClass['id']), null, __('Are you sure you want to delete # %s?', $indCodeClass['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li>
				<?php echo $this->Html->link(__('New Ind Code Class'), array('controller' => 'IndCodeClasses', 'action' => 'add'));
				?>
			</li>
		</ul>
	</div>
</div>
