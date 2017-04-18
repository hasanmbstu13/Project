<?php echo $this -> Session -> flash(); ?>
<div class="books view">
	<h2><?php echo __('বই এর তথ্য '); ?></h2>
	<dl>
		<dt>
			<?php echo __('Book Code'); ?>
		</dt>
		<dd>
			<?php echo h($book['Book']['id']); ?>
			&nbsp;
		</dd>

		<dt>
			<?php echo __('Division'); ?>
		</dt>
		<dd>
			<?php echo h($book['GeoCodeDivn']['divn_name']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Zila'); ?>
		</dt>
		<dd>
			<?php echo h($book['GeoCodeZila']['zila_name']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Upazila'); ?>
		</dt>
		<dd>
			<?php echo h($book['GeoCodeUpazila']['upzila_name']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('RMO Name'); ?>
		</dt>
		<dd>
			<?php echo h($book['GeoCodeRmo']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('PSA Name'); ?>
		</dt>
		<dd>
			<?php echo h($book['GeoCodePsa']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Union'); ?>
		</dt>
		<dd>
			<?php echo h($book['GeoCodeUnion']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Entry By'); ?>
		</dt>
		<dd>
			<?php echo h($book['Book']['entry_by']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Updated'); ?>
		</dt>
		<dd>
			<?php echo h($book['Book']['updated']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Modified'); ?>
		</dt>
		<dd>
			<?php echo h($book['Book']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __('Actions');
	?></h3>
	<ul>

		<li>
			<?php echo $this->Html->link(__('বই এর তালিকা'), array('action' => 'index'));
			?>
		</li>

	</ul>
</div>

<br />
