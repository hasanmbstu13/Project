<style>
	#rightCode {

		height: 20px;
		width: 50px;
		text-align: center;
	}

	.active {

	}

</style>

<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('BACK TO BOOKS'), array('controller' => 'QuesSixChecks', 'action' => 'books', $book['geo_code_union_id'], $book['geo_code_upazila_id'])); ?>
</div>
<br />

<div class="geoCodeRmos index">
	<h2><?php echo __('সংশোধনী বই নং: ' . $id); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th style="text-align: center;"><?php echo 'ইউনিট নম্বর'; ?></th>
			<th  style="text-align: center;"><?php echo 'BSIC কোড'; ?></th>
			<th><?php echo 'বইয়ে পাওয়া বর্ননা'; ?></th>
			<th><?php echo 'কোড অনুযায়ী বর্ননা'; ?></th>
			<th style="text-align: center; width: 300px;">Wrong/Right</th>

		</tr>

		<?php

echo $this->Form->create();

$i = 0;

foreach ($questionaires as $questionaire): ++$i;
		?>
		<tr>
			<td  style="text-align: center;"><?php echo h($questionaire['Questionaire']['q1_unit_serial_no']); ?>&nbsp;</td>
			<td  style="text-align: center;"><?php echo h($questionaire['Questionaire']['q6_ind_code_class_id']); ?>&nbsp;</td>
			<td style="font-weight: bold;"><?php echo h($questionaire['Questionaire']['q6_economy_description']); ?>&nbsp;</td>
			<td style="font-weight: bold;"><?php echo h($questionaire['Questionaire']['q6_economy_description_orginal']); ?>&nbsp;</td>

			<td style="text-align: center;width: 300px;">
			<input type="hidden" name="qusID[<?=$i?>]" value="<?=$questionaire['Questionaire']['id']?>" />
			<input  type="radio" value="0" name="check_status[<?=$i?>]">
			Wrong
			<input  type="radio" value="1" name="check_status[<?=$i?>]">
			Right </td>
			</td>
		</tr>

		<?php endforeach; ?>
	</table>

	<div>
		<?php echo $this -> Form -> end(__('Submit'));
		?>
	</div>
</div>
