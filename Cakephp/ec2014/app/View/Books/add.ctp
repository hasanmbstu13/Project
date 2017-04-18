<?php echo $this -> Session -> flash(); ?>
<style type="text/css">
	div#invalidCode {
		color: red;
	}

	#BookGeoCodeDivnId, #BookGeoCodeZilaId, #BookGeoCodeUpazilaId, #BookGeoCodeRmoId, #BookGeoCodePsaId, #BookGeoCodeUnionId, #BookAreaId {
		text-align: center;
	}

</style>

</br>

<fieldset>
	<legend>
		শুমারি&nbsp;বই&nbsp;পরিচিতি
	</legend>
	<div class="books form">
		<?php echo $this -> Form -> create('Book'); ?>

		<div id="book_heading">
			<ul>
				<li>
					কোড
				</li>
				<li>
					বিবরণ
				</li>
			</ul>
		</div>
		<?php echo $this -> Form -> input('geo_code_divn_id', array('label' => 'বিভাগ', 'value' => $divnCode, 'type' => 'text', 'required' => 'required', 'readonly' => 'readonly', 'maxlength' => 2, 'minlength' => 2)); ?>

		<div id="BookGeoCodeDivnName" class="message">
			<?php echo  $divnName
			?>
		</div>

		<?php echo $this -> Form -> input('geo_code_zila_id', array('label' => 'জেলা', 'value' => $zilaCode, 'required' => 'required', 'readonly' => 'readonly', 'type' => 'text', 'maxlength' => 2, 'minlength' => 2)); ?>

		<div id="BookGeoCodeZilaName" class="message">

			<?php echo  $zilaName
			?>
		</div>

		<?php echo $this -> Form -> input('geo_code_upazila_id', array('label' => 'উপজেলা/থানা', 'type' => 'text', 'value' => $upazilaCode, 'required' => 'required', 'readonly' => 'readonly', 'maxlength' => 2, 'minlength' => 2)); ?>

		<div id="BookGeoCodeUpazilaName" class="message">

			<?php echo $upazilaName
			?>
		</div>

		<?php echo $this -> Form -> input('geo_code_rmo_id', array('label' => 'RMO', 'autofocus' => 'autofocus', 'type' => 'text', 'required' => 'required', 'maxlength' => 1, 'minlength' => 1)); ?>

		<div id="BookGeoCodeRmaName" class="message"></div>

		<div class="input text required" id="growth_centre">

			<label for="BookgrowthCentre">গ্রোথ সেন্টার (GC) অন্তর্ভুক্ত কিনা</label>
			<input id="BookgrowthCentre" type="radio" value="1" name="data[Book][growth_centre]">
			হ্যাঁ
			<input id="BookgrowthCentre" type="radio" value="2" name="data[Book][growth_centre]">
			না
		</div>

		<?php echo $this -> Form -> input('geo_code_psa_id', array('label' => 'পৌরসভা/সিটি কর্পোরেশন', 'type' => 'text', 'maxlength' => 2, 'minlength' => 2)); ?>

		<div id="BookGeoCodePsaName" class="message"></div>

		<?php 
		
		if(is_numeric($code_of_union))
		{
			echo $this -> Form -> input('geo_code_union_id', array('label' => 'ইউনিয়ন/ওয়ার্ড', 'type' => 'text', 'required' => 'required', 'maxlength' => 2, 'minlength' => 2, 'readonly' => 'readonly', 'value' => $code_of_union)); 
		}
		else 
		{
			echo $this -> Form -> input('geo_code_union_id', array('label' => 'ইউনিয়ন/ওয়ার্ড', 'type' => 'text', 'required' => 'required', 'maxlength' => 2, 'minlength' => 2)); 
		}
			
		?>

		<div id="BookGeoCodeUnionName" class="message"><?php echo $name_of_union; ?></div>

		<?php echo $this -> Form -> input('area_id', array('label' => 'গণনা এলাকা (EA)', 'type' => 'text', 'maxlength' => 2, 'minlength' => 2, 'required' => 'required')); ?>
		<div id="instruction" class="message">
			(২ ডিজিটে পূরণ করুন)
		</div>

		<div class="input text required">
			<label for="BookBookCode" style="width: 196px; ">বই নং (ইউনিয়ন/ওয়ার্ড wise)</label>

			<input id="BookBookCode" type="text" maxlength="50"  style="width:110px; text-align: center;" name="data[Book][book_code]" readonly="readonly" required="required">

			<input id="BookBookCode2" type="text" maxlength="2" text-align: "center" style="width:87px ;  text-align: center;" name="data[Book][book_code2]"  required="required">
		</div>

		<div id="instruction" class="message">
			(২ ডিজিটে পূরণ করুন)
		</div>
		<?php //echo $this -> Form -> end(__('Submit')); ?>
	</div>
</fieldset>

<div class="modal"></div>
<?php $Addoptions = array('label' => 'Submit', 'value' => '', 'id' => 'saveBookID', 'div' => array());
echo $this -> Form -> end($Addoptions);
?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li>
			<?php echo $this -> Html -> link(__('বই এর তালিকা'), array('action' => 'index')); ?>
		</li>

	</ul>

	<?php

	echo $this -> Html -> script('books/add.js');
	echo $this -> Html -> script('books/form_submit_validation');
	?>
</div>
<!--<div class="modal"></div>-->

