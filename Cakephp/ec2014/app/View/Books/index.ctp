<?php echo $this -> Session -> flash(); ?>
<div class="books index">
	<h2>বই&nbsp;এর&nbsp;তালিকা</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>

			<th>Book Code</th>
			<th>Division</th>
			<th>Zilla</th>
			<th>Upazilla</th>
			<th>RMO Name</th>
			<th>PSA Name</th>
			<th>Union Name</th>
			<th>entry_by</th>
			<th>created</th>
			<th>modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
foreach ($books as $book):
		?>
		<tr>
			<td><?php echo h($book['Book']['id']); ?>&nbsp;</td>
			<td><?php echo h($book['GeoCodeDivn']['divn_name']); ?></td>
			<td><?php echo h($book['GeoCodeZila']['zila_name']); ?></td>
			<td><?php echo h($book['GeoCodeUpazila']['upzila_name']); ?></td>
			<td><?php echo h($book['GeoCodeRmo']['rmo_type_eng']); ?></td>
			<td><?php echo h($book['GeoCodePsa']['psa_name']); ?></td>
			<td><?php echo h($book['GeoCodeUnion']['union_name']); ?></td>
			<td><?php echo h($book['Book']['entry_by']); ?>&nbsp;</td>
			<td><?php echo h($book['Book']['created']); ?>&nbsp;</td>
			<td><?php echo h($book['Book']['modified']); ?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $book['Book']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

	<p>
		<?php echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
	</p>

	<div class="paging">
		<?php
		echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<br />
