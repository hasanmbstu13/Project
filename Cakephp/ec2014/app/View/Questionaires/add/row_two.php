<!--
QUESTION 7 HIDDEN CODES DESCRIPTION=======================================
-->
<?=$this -> Form -> input('q7_product_desc_1', array(
                    'label' => FALSE,
                    'type'=>'hidden'))

?>
<?=$this -> Form -> input('q7_product_desc_2', array(
'label' => FALSE,
'type'=>'hidden'))
?>
<?=$this -> Form -> input('q7_product_desc_3', array(
'label' => FALSE,
'type'=>'hidden'))
?>
<?=$this -> Form -> input('q7_product_desc_4', array(
'label' => FALSE,
'type'=>'hidden'))
?>

<!--QUESTION 7 HIDDEN CODES IS RIGHT================ -->
<?=$this -> Form -> input('q7_product_isright_1', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>
<?=$this -> Form -> input('q7_product_isright_2', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>
<?=$this -> Form -> input('q7_product_isright_3', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>
<?=$this -> Form -> input('q7_product_isright_4', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>

<!-- QUESTION 7 HIDDEN CODES DESCRIPTION===================-->
<?=$this -> Form -> input('q8_service_desc_1', array(
'label' => FALSE,
'type'=>'hidden'))
?>
<?=$this -> Form -> input('q8_service_desc_2', array(
'label' => FALSE,
'type'=>'hidden'))
?>
<?=$this -> Form -> input('q8_service_desc_3', array(
'label' => FALSE,
'type'=>'hidden'))
?>
<?=$this -> Form -> input('q8_service_desc_4', array(
'label' => FALSE,
'type'=>'hidden'))
?>

<!--QUESTION 8 HIDDEN CODES IS RIGHT===================== -->
<?=$this -> Form -> input('q8_service_isright_1', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>
<?=$this -> Form -> input('q8_service_isright_2', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>
<?=$this -> Form -> input('q8_service_isright_3', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>
<?=$this -> Form -> input('q8_service_isright_4', array(
'label' => FALSE,
'type'=>'hidden',
'value'=>1))
?>

<!-- 	TABLE TWO START	 -->
<table id="table_2" border="1">

	<tr>

		<td>
		<div id = "div_7">
			<h3>৭. উৎপাদনকারী ইউনিটের প্রধান প্রধান উৎপাদিত দ্রব্যাদির বিবরণ </h3>
			<hr />

			<table id = "sub_tbl_1">

				<tr>
					<td align="center"> কোড</td>
					<td align="center" width="280px"> বিবরণ</td>

				</tr>

				<tr>

					<td><?=$this -> Form -> input('q7_product_id_1', array(
'label' => '১.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength'=>5))
					?></td>

					<td><div id="QuestionaireQ7ProductDesc1div" class="div_seven_message"></div></td>

				</tr>

				<tr>
					<td><?=$this -> Form -> input('q7_product_id_2', array(
'label' => '২.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ7ProductDesc2div" class="div_seven_message"></div></td>
				</tr>

				<tr>

					<td></tdtr><?=$this -> Form -> input('q7_product_id_3', array(
'label' => '৩.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ7ProductDesc3div" class="div_seven_message"></div></td>
				</tr>

				<tr>

					<td><?=$this -> Form -> input('q7_product_id_4', array(
'label' => '৪.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ7ProductDesc4div" class="div_seven_message"></div></td>
				</tr>

			</table>

		</div></td>

		<td>
		<div id = "div_8">
			<h3>৮. মেরামত/বিক্রয়/সেবা প্রদানকারী ইউনিটের কাজের বিবরণ</h3>
			<hr />
			<table id = "sub_tbl_2">

				<tr>
					<td align="center"> কোড</td>
					<td align="center" width="280px">বিবরণ</td>

				</tr>

				<tr>

					<td><?=$this -> Form -> input('q8_service_id_1', array(
'label' =>'১.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ8ServiceDesc1div" class="div_seven_message"></div></td>
				</tr>

				<tr>

					<td><?=$this -> Form -> input('q8_service_id_2', array(
'label' => '২.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ8ServiceDesc2div" class="div_seven_message"></div></td>
				</tr>

				<tr>

					<td></tdtr><?=$this -> Form -> input('q8_service_id_3', array(
'label' => '৩.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ8ServiceDesc3div" class="div_seven_message"></div></td>
				</tr>

				<tr>

					<td><?=$this -> Form -> input('q8_service_id_4', array(
'label' => '৪.',
'type'=>'text',
'style'=>'text-align:center;',
'maxlength'=>5,
'minlength' =>5))
					?></td>
					<td><div id="QuestionaireQ8ServiceDesc4div" class="div_seven_message"></div></td>
				</tr>

			</table>

		</div></td>

		<!--  SECTION NINE -->
		<td>
		<div id = "div_9">
			<h3>৯. ইউনিটের (প্রতিষ্ঠান) আইনগত মালিকানা</h3>
			<hr />

			<br />
			<label>(কোড লিখুন)</label>
			<?=$this -> Form -> input('q9_legal_entity_type_id', array(
'label' => false,
'type' => 'text',
'style'=>'width: 65px; text-align:center;',
'maxlength'=>2,
'minlength' =>2 ))
			?>

			<div id="q9details"></div>

		</div></td>
		
		
		
		<!-- SECTION 10 -->

		<td>
		<div id = "div_10">
			<h3>১০. ইউনিটে প্রবাসী বাংলাদেশিদের বিনিয়োগ আছে কি ? </h3>
			<hr />
			<table id = 'tbl_10_1' border = '1'>

				<tr>

					<?php echo $this -> Form -> input('q10_is_nbr_investment', array('label' => false, 'type' => 'text', 'style' => 'width: 65px; text-align:center;', 'options' => $option_yes_no)); ?>
					<div id="q10_details"></div>
				</tr>

				<tr>
					<div id = "div_10_1">
						<hr />
						<h3>১০.১  হ্যাঁ হলে বিনিয়োগের পরিমাণ(হাজার টাকায়)</h3>

						<?=$this -> Form -> input('q10_nbr_amount_in_thou', array(
'label' => false,
'style'=>'width: 85px; text-align:center;',
'type' => 'text'))
						?>
					</div>
				</tr>
			</table>
		</td>

		<!--    Start table 11  -->
		<td>
		<table id = 'tbl_11_1' border= '1'>

			<tr>
				<td><h3>১১.ইউনিটটি নিবন্ধিত কি ? </h3>
				<hr />
				<?=$this -> Form->input('q11_is_registered', array(
'label' => false,
'type' => 'text',
'style'=>'width: 65px; text-align:center;',
'maxlength'=>2,
'minlength' =>2 ))
				?>
				<div id="q11details"></div>
			</tr>
			<tr>

				<!--   SECTION  CAN BE EDITED -->

				<td>
				<div id = "div_11_1">
					<h3>১১.১. হ্যাঁ হলে কোথায় নিবন্ধিত? </h3>
					<hr />
					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q11_registrar_id', array('label' => false, 'type' => 'text', 'style' => 'width: 65px; text-align:center;', 'maxlength' => 2, 'minlength' => 2)) ?>
					<div id="q11_1details"></div>

				</div></td>

			</tr>
		</table></td>

	</tr>
</table>