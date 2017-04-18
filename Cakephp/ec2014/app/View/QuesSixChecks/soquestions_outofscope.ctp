<style>
	input.rightCode {

		height: 20px;
		width: 50px;
		text-align: center;
	}

	.active {

	}

</style>

<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('BACK TO BOOKS'), array('controller' => 'QuesSixChecks', 'action' => 'sobooks_outofscope', $secQuestions[0]['Book']['geo_code_union_id'])); ?>
</div>
<br />

<div class="geoCodeRmos index">
	<h2><?php echo __('সংশোধনী বই নং: ' . $id); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th style="text-align: center;"><?php echo 'ইউনিট নম্বর'; ?></th>
			<th  style="text-align: center;"><?php echo 'BSIC কোড'; ?></th>
			<th><?php echo 'বইয়ে পাওয়া বর্ণনা'; ?></th>
			<th><?php echo 'কোড অনুযায়ী বর্ণনা'; ?></th>
			<th style="text-align: center;"><?php echo 'Wrong/Right'; ?></th>
			<th style="text-align: center;"><?php echo 'সংশোধনী কোড'; ?></th>
			<th><?php echo 'সংশোধনী কোড অনুযায়ী বর্ণনা'; ?></th>
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
			<td style="text-align: center;">
			<input class="rightCode" type="text" id="rightCode_<?=$questionaire['Questionaire']['id']?>"  name="right_code[<?=$questionaire['Questionaire']['id']?>]" maxlength="4" minlength = "4" />
			</td>

			<td><div id="DESC_<?=$questionaire['Questionaire']['id']?>" class="rightDescription"></div> &nbsp;</td>

			</td>

		</tr>

		<?php endforeach; ?>
	</table>

	<div>
		<?php echo $this -> Form -> end(__('Submit')); ?>
	</div>
</div>

<script>
	$(document).ready(function() {

		$("input.rightCode").live("keydown", function(e) {
			var key = e.charCode || e.keyCode || 0;
			// allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
			return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
		});

		$('input.rightCode').keyup(function(e) {

			var value = $(this).val();

			var codeID = $(this).attr('id');
			codeID = codeID.split("_");
			var ID_number = codeID[1];
			var ID_Name = codeID[0];
			var Div_ID = "DESC_" + ID_number;
			
			$("#" + Div_ID).html("");

			if(value.length >= 4) {
			
			
			
			//console.log("DIV ID: " + Div_ID);
			
				var selectvalue = value;
				var pathname = window.location.pathname;
				var path = pathname.split('/soquestions');
				path = path[0] + "/getIndCodeClass";

				$.ajax({
					url : path,
					type : "POST",
					dataType : 'json',
					data : {
					ind_code : selectvalue,

					},
					success : function(data) {

						var chk = "NO"
						$.each(data, function(index, element) {
						var des_name = element.IndCodeClass.class_code_desc_bng;
						$('#' + Div_ID).html(des_name);
						chk = "YES"

						});

						if(chk == "NO") {
						$("#" + Div_ID).html("");
						$("#" + ID_Name + "_" + ID_number).val("");
						}
					}
				});
			}
		});

	});
</script>
