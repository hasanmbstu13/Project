<?php echo $this -> Session -> flash(); ?>
<style type="text/css">
	div#invalidCode {
		color: red;
	}

	#BookGeoCodeDivnId, #BookGeoCodeZilaId, #BookGeoCodeUpazilaId, #BookGeoCodeRmoId, #BookGeoCodePsaId, #BookGeoCodeUnionId, #BookGeoCodeElakaId {
		text-align: center;
	}

</style>

<div class="books form">
	<?php echo $this -> Form -> create('Book'); ?>

	<!-- link -->
	</br>
	</br>

	<fieldset>
		<legend>
			<?php echo __('শুমারি বই পরিচিতি'); ?>
		</legend>

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
		
		<?php echo $this -> Form -> input('id', array('label' => 'বিভাগ', 'type' => 'hidden', 'readonly' => 'readonly', 'value' => $Books['Book']['id'])); ?>
		
		<?php echo $this -> Form -> input('geo_code_divn_id', array('label' => 'বিভাগ', 'type' => 'text', 'maxlength' => 2, 'minlength' => 2, 'readonly' => 'readonly', 'value' => $Books['GeoCodeDivn']['divn_code'])); ?>

		<div id="BookGeoCodeDivnName" class="message">
			<?=$Books['GeoCodeDivn']['divn_name']
			?>
		</div>

		<?php echo $this -> Form -> input('geo_code_zila_id', array('label' => 'জেলা', 'required' => 'required', 'type' => 'text', 'maxlength' => 2, 'minlength' => 2, 'readonly' => 'readonly', 'value' => $Books['GeoCodeZila']['zila_code'])); ?>

		<div id="BookGeoCodeZilaName" class="message">
			<?=$Books['GeoCodeZila']['zila_name']
			?>
		</div>

		<?php echo $this -> Form -> input('geo_code_upazila_id', array('label' => 'উপজেলা/থানা', 'type' => 'text', 'required' => 'required', 'maxlength' => 2, 'readonly' => 'readonly', 'minlength' => 2, 'value' => $Books['GeoCodeUpazila']['upzila_code'])); ?>

		<div id="BookGeoCodeUpazilaName" class="message">
			<?=$Books['GeoCodeUpazila']['upzila_name']
			?>
		</div>

		<?php echo $this -> Form -> input('geo_code_rmo_id', array('label' => 'RMO', 'type' => 'text', 'required' => 'required', 'maxlength' => 1, 'readonly' => 'readonly', 'minlength' => 1, 'value' => $Books['GeoCodeRmo']['rmo_code'])); ?>
		<div id="BookGeoCodeRmaName" class="message">
			<?=$Books['GeoCodeRmo']['rmo_type_eng']
			?>
		</div>

		<?php
if($Books['GeoCodeRmo']['rmo_code'] == "1" || $Books['GeoCodeRmo']['rmo_code'] == "3" || $Books['GeoCodeRmo']['rmo_code'] == "7"):
		?>

		<div class="input text required" id="growth_centre">

			<label for="BookgrowthCentre">গ্রোথ সেন্টার (GC) অন্তর্ভুক্তি কিনা</label>
			<?php if($Books['Book']['growth_centre'] == 1):
			?>
			<input id="BookgrowthCentre" type="radio" value="1" checked name="data[Book][growth_centre]">
			হ্যাঁ
			<input id="BookgrowthCentre" type="radio" value="2" name="data[Book][growth_centre]">
			না
		</div>
		<?php endif; ?>
		<?php if($Books['Book']['growth_centre'] == 2):
		?>
		<input id="BookgrowthCentre" type="radio" value="1"  name="data[Book][growth_centre]">
		হ্যাঁ
		<input id="BookgrowthCentre" type="radio" value="2" checked name="data[Book][growth_centre]">
		না
</div>
<?php endif; ?>

<?php endif; ?>

<?php echo $this -> Form -> input('geo_code_psa_id', array('label' => 'পৌরসভা/সিটি কর্পোরেশন', 'type' => 'text', 'maxlength' => 2, 'minlength' => 2, 'readonly' => 'readonly', 'value' => $Books['GeoCodePsa']['psa_code'])); ?>

<div id="BookGeoCodePsaName" class="message">
	<?=$Books['GeoCodePsa']['psa_name']
	?>
</div>

<?php echo $this -> Form -> input('geo_code_union_id', array('label' => 'ইউনিয়ন/ওয়ার্ড', 'type' => 'text', 'required' => 'required', 'maxlength' => 2, 'minlength' => 2, 'readonly' => 'readonly', 'value' => $Books['GeoCodeUnion']['union_code'])); ?>

<div id="BookGeoCodeUnionName" class="message">
	<?=$Books['GeoCodeUnion']['union_name']
	?>
</div>

<?php echo $this -> Form -> input('geo_code_elaka_id', array('label' => 'গণনা এলাকা (EA)', 'type' => 'text', 'readonly' => 'readonly', 'maxlength' => 2, 'minlength' => 2, 'value' => $Books['Book']['area_id'])); ?>

<div class="input text required">
	<label for="BookBookCode" style="width: 176px; ">বই নং (ইউনিয়ন/ওয়ার্ড wise)</label>


<?php 
	$mainId = $Books['Book']['id'];
?>
	
	

	<input id="BookBookCode" type="text" maxlength="50"  style="width:110px; text-align: center;" value = "<?=substr($mainId, 0, 12)?>" readonly="readonly" required="required">
	
	<input id="BookBookCode2" type="text" maxlength="2" text-align: "center" style="width:87px ;  text-align: center;" readonly="readonly" value = "<?=substr($mainId, 12, 14)?>"  required="required" >


	
</div>

<div id="instruction" class="message">
	(২ ডিজিটে পূরণ করুন)
</div>
</fieldset>
<?php echo $this -> Form -> end(__('প্রশ্নপত্রে যান')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li>
			<?php echo $this -> Html -> link(__('List Books'), array('action' => 'index')); ?>
		</li>

	</ul>

	
</div>

