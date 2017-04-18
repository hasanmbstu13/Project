<?php echo $this->Session->flash(); ?>
<div class="questionaires form">
<?php echo $this->Form->create('Questionaire'); ?>
	<fieldset>
		<legend><?php echo __('Edit Questionaire'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('book_id');
		echo $this->Form->input('q1_geo_code_mauza_id');
		echo $this->Form->input('q1_unit_serial_no');
		echo $this->Form->input('q2_unit_name');
		echo $this->Form->input('q2_village_maholla');
		echo $this->Form->input('q2_home_market');
		echo $this->Form->input('q2_road_no_name');
		echo $this->Form->input('q2_holding_no');
		echo $this->Form->input('q2_telephone_no');
		echo $this->Form->input('q2_fax_no');
		echo $this->Form->input('q2_email_address');
		echo $this->Form->input('q3_unit_head_gender');
		echo $this->Form->input('q3_unit_head_education_id');
		echo $this->Form->input('q3_unit_head_age');
		echo $this->Form->input('q4_unit_type');
		echo $this->Form->input('q4_unit_org_type');
		echo $this->Form->input('q5_unit_head_economy_id');
		echo $this->Form->input('q6_economy_description');
		echo $this->Form->input('q6_ind_code_class_id');
		echo $this->Form->input('q7_product_desc_1');
		echo $this->Form->input('q7_product_id_1');
		echo $this->Form->input('q7_product_desc_2');
		echo $this->Form->input('q7_product_id_2');
		echo $this->Form->input('q7_product_desc_3');
		echo $this->Form->input('q7_product_id_3');
		echo $this->Form->input('q7_product_desc_4');
		echo $this->Form->input('q7_product_id_4');
		echo $this->Form->input('q8_service_desc_1');
		echo $this->Form->input('q8_service_id_1');
		echo $this->Form->input('q8_service_desc_2');
		echo $this->Form->input('q8_service_id_2');
		echo $this->Form->input('q8_service_desc_3');
		echo $this->Form->input('q8_service_id_3');
		echo $this->Form->input('q8_service_desc_4');
		echo $this->Form->input('q8_service_id_4');
		echo $this->Form->input('q9_legal_entity_type_id');
		echo $this->Form->input('q10_is_nbr_investment');
		echo $this->Form->input('q10_nbr_amount_in_thou');
		echo $this->Form->input('q11_is_registered');
		echo $this->Form->input('q11_registrar_id');
		echo $this->Form->input('q12_year_of_start');
		echo $this->Form->input('q13_sale_procedure');
		echo $this->Form->input('q14_is_accountable');
		echo $this->Form->input('q15_salary_instr');
		echo $this->Form->input('q15_salary_period');
		echo $this->Form->input('q16_fixed_capital');
		echo $this->Form->input('q17_hr_male');
		echo $this->Form->input('q17_hr_female');
		echo $this->Form->input('q17_hr_male_foc');
		echo $this->Form->input('q17_hr_female_foc');
		echo $this->Form->input('q17_hr_male_fulltime');
		echo $this->Form->input('q17_hr_female_fulltime');
		echo $this->Form->input('q17_hr_male_parttime');
		echo $this->Form->input('q17_hr_female_parttime');
		echo $this->Form->input('q17_hr_male_irregular');
		echo $this->Form->input('q17_hr_female_irregular');
		echo $this->Form->input('q18_machine_uses');
		echo $this->Form->input('q19_marketing');
		echo $this->Form->input('q20_fuel_uses');
		echo $this->Form->input('q21_is_it_enabled');
		echo $this->Form->input('q22_is_fire_secured');
		echo $this->Form->input('q22_is_fire_device_maintained');
		echo $this->Form->input('q23_is_garbage_proper');
		echo $this->Form->input('q24_is_toilet_available');
		echo $this->Form->input('q24_is_ladies_toilet_available');
		echo $this->Form->input('q25_is_tin_registered');
		echo $this->Form->input('q26_is_vat_registered');
		echo $this->Form->input('q27_year_vat_registered');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Questionaire.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Questionaire.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'Books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'Books', 'action' => 'add')); ?> </li>
	</ul>
</div>
