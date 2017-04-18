<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('BACK TO BOOKS'), array('controller' => 'QuesSixChecks', 'action' => 'approval_books_outofscope', $secQuestions[0]['Book']['geo_code_union_id'])); ?>
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
			<th style="text-align: center;"><?php echo 'Wrong/Right'; ?></th>
			<th style="text-align: center;"><?php echo 'সংশোধনী কোড'; ?></th>
			<th style="text-align: center;"><?php echo 'সংশোধনী কোড অনুযায়ী বর্ননা'; ?></th>
			<th style="text-align: center; width: 300px;"><?php echo 'Approved/Rejected'; ?></th>
		</tr>

		<?php

echo $this->Form->create();

foreach ($questionaires as $questionaire):
		?>
		<tr>
			<td  style="text-align: center;"><?php echo h($questionaire['Questionaire']['q1_unit_serial_no']); ?>&nbsp;</td>
			<td  style="text-align: center;"><?php echo h($questionaire['Questionaire']['q6_ind_code_class_id']); ?>&nbsp;</td>
			<td style="font-weight: bold;"><?php echo h($questionaire['Questionaire']['q6_economy_description']); ?>&nbsp;</td>
			<td style="font-weight: bold;"><?php echo h($questionaire['Questionaire']['q6_economy_description_orginal']); ?>&nbsp;</td>

			<td style="text-align: center;"><?php
			if ($questionaire['QuesSixCheck']['is_right'] == 1) {
				echo "Right";
			} else {
				echo "Wrong";
			}
			?></td>
			<td style="text-align: center;"><?=$questionaire['QuesSixCheck']['right_code']
			?></td>

			<td style="font-weight: bold;"><?=$questionaire['Questionaire']['q6_economy_description_of_right_code']
			?>
			&nbsp;</td>

			</td>

			<td style="text-align: center; width: 300px;">
			<input  type="radio" value="APPROVE" name="check_status[<?=$questionaire['Questionaire']['id']?>]">
			Approve
			<input  type="radio" value="REJECT" name="check_status[<?=$questionaire['Questionaire']['id']?>]">
			Reject </td>

		</tr>

		<?php endforeach; ?>
	</table>

	<div>
		<?php echo $this -> Form -> end(__('Submit')); ?>
	</div>
</div>
