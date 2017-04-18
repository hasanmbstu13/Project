
<h1 style="text-align:center;">BBS Economic Census 2013</h1>
<h3 style="text-align:center;">Question-wise Data Analysis</h3>

<div id = "table_for_print">

<h4>ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">


<tr>
	<td>Total</td>
	<td><?=$data['q_id']['id']?></td>
</tr>	

<tr>
	<td>Total Null</td>
	<td><?=$data['q_id']['id_null']?></td>
</tr>	
</table>



<h4>BOOK ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['book_id']['book_id_null']?></td>
</tr>	
</table>


<h4>Q1_GEO_CODE_MAUZA_NAME</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?= $data['q1_geo_code_mauza_name']['null']?></td>
</tr>	
</table>

<h4>Q1_GEO_CODE_MAUZA_ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q1_geo_code_mauza_id']['total_null']?></td>
</tr>	
</table>


<h4>Q1_UNIT_SERIAL_NO</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
	<tr>
		<td>Total Null</td>
		<td><?=$data['q1_unit_serial_no']['null']?></td>
	</tr>

</table>
<h4>Q2_UNIT_NAME</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_unit_name']?></td>
</tr>	
</table>

<h4>Q2_VILLAGE_MAHOLLA</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_village_maholla']?></td>
</tr>	
</table>

<h4>Q2_HOME_MARKET</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?= $data['q2_home_market']?></td>
</tr>	
</table>

<h4>Q2_ROAD_NO_NAME</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_road_no_name']?></td>
</tr>	
</table>

<h4>Q2_HOLDING_NO</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_holding_no']?></td>
</tr>	
</table>

<h4>Q2_TELEPHONE_NO</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_telephone_no']?></td>
</tr>	
</table>

<h4>Q2_FAX_NO</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_fax_no']?></td>
</tr>	
</table>

<h4>Q2_EMAIL_ADDRESS</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q2_email_address']?></td>
</tr>	
</table>

<h4>Q3_UNIT_HEAD_GENDER</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q3_unit_head_gender']['null']?></td>
</tr>	
<tr>
	<td>Male</td>
	<td><?=$data['q3_unit_head_gender']['1']?></td>
</tr>	
<tr>
	<td>Female</td>
	<td><?=$data['q3_unit_head_gender']['2']?></td>
</tr>	
<tr>
	<td>Others</td>
	<td><?=$data['q3_unit_head_gender']['3']?></td>
</tr>
<tr>
	<td>No Information</td>
	<td><?=$data['q3_unit_head_gender']['9']?></td>
</tr>	
</table>


<h4>Q3_UNIT_HEAD_EDUCATION_ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q3_unit_head_education_id']?></td>
</tr>	
</table>

<h4>Q3_UNIT_HEAD_AGE</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q3_unit_head_age']?></td>
</tr>	
</table>

<h4>Q4_UNIT_TYPE</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total (Unit)</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q4_unit_type']['null']?></td>
</tr>

<tr>
	<td>Economic Household</td>
	<td><?=$data['q4_unit_type']['eco_house']?></td>
</tr>

<tr>
	<td>Organization</td>
	<td><?=$data['q4_unit_type']['organization']?></td>
</tr>

</table>

<h4>Q4_UNIT_ORG_TYPE</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total (Organization)</td>
	<td><?=$data['q4_unit_org_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q4_unit_org_type']['null']?></td>
</tr>

<tr>
	<td>Parmanent Establishment</td>
	<td><?=$data['q4_unit_org_type']['TE']?></td>
</tr>

<tr>
	<td>Temporary Establishment</td>
	<td><?=$data['q4_unit_org_type']['PE']?></td>
</tr>

</table>


<h4>Q5_UNIT_HEAD_ECONOMY_ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q5_unit_head_economy_id']?></td>
</tr>	
</table>


<h4>Q6_ECONOMY_DESCRIPTION</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q6_economy_description']?></td>
</tr>	
</table>



<h4>Q6_IND_CODE_CLASS_ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q6_ind_code_class_id']?></td>
</tr>	
</table>


<h4>Questions 7 and Questions 8</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q7_q8']?></td>
</tr>	
</table>


<h4>Q9_LEGAL_ENTITY_TYPE_ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['organization']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q9_legal_entity_type_id']['null']?></td>
</tr>
<tr>
	<td>Private</td>
	<td><?=$data['q9_legal_entity_type_id']['01']?></td>
</tr>
<tr>
	<td>Partnership</td>
	<td><?=$data['q9_legal_entity_type_id']['02']?></td>
</tr>
<tr>
	<td>Private Limited</td>
	<td><?=$data['q9_legal_entity_type_id']['03']?></td>
</tr>
<tr>
	<td>Public Limited</td>
	<td><?=$data['q9_legal_entity_type_id']['04']?></td>
</tr>

<tr>
	<td>Government</td>
	<td><?=$data['q9_legal_entity_type_id']['05']?></td>
</tr>
<tr>
	<td>Autonomous</td>
	<td><?=$data['q9_legal_entity_type_id']['06']?></td>
</tr>
<tr>
	<td>Foreign</td>
	<td><?=$data['q9_legal_entity_type_id']['07']?></td>
</tr>
<tr>
	<td>Joint Venture</td>
	<td><?=$data['q9_legal_entity_type_id']['08']?></td>
</tr>
<tr>
	<td>Co-oprative</td>
	<td><?=$data['q9_legal_entity_type_id']['09']?></td>
</tr>
<tr>
	<td>NPI</td>
	<td><?=$data['q9_legal_entity_type_id']['10']?></td>
</tr>
<tr>
	<td>NRB</td>
	<td><?=$data['q9_legal_entity_type_id']['11']?></td>
</tr>
<tr>
	<td>Others</td>
	<td><?=$data['q9_legal_entity_type_id']['12']?></td>
</tr>
<tr>
	<td>No Information</td>
	<td><?=$data['q9_legal_entity_type_id']['99']?></td>
</tr>

</table>


<h4>Q10_IS_NBR_INVESTMENT</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q10_is_nbr_investment']?></td>
</tr>	
</table>


<h4>Q10_NBR_AMOUNT_IN_THOU</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q10_nbr_amount_in_thou']?></td>
</tr>	
</table>

<h4>Q11_IS_REGISTERED</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q11_is_registered']['null']?></td>
</tr>

<tr>
	<td>Yes</td>
	<td><?=$data['q11_is_registered']['1']?></td>
</tr>


<tr>
	<td>No</td>
	<td><?=$data['q11_is_registered']['2']?></td>
</tr>


<tr>
	<td>Not Applicable</td>
	<td><?=$data['q11_is_registered']['3']?></td>
</tr>


<tr>
	<td>No Information</td>
	<td><?=$data['q11_is_registered']['9']?></td>
</tr>

</table>


<h4>Q11_REGISTRAR_ID</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q11_registrar_id']['null']?></td>
</tr>

<tr>
	<td>Joint stock company</td>
	<td><?=$data['q11_registrar_id']['01']?></td>
</tr>
<tr>
	<td>Investment Board</td>
	<td><?=$data['q11_registrar_id']['02']?></td>
</tr>
<tr>
	<td>BSCIC</td>
	<td><?=$data['q11_registrar_id']['03']?></td>
</tr>
<tr>
	<td>BEPZA</td>
	<td><?=$data['q11_registrar_id']['04']?></td>
</tr>
<tr>
	<td>Directorate of Inspection for Factories</td>
	<td><?=$data['q11_registrar_id']['05']?></td>
</tr>
<tr>
	<td>Cooperative Office</td>
	<td><?=$data['q11_registrar_id']['06']?></td>
</tr>
<tr>
	<td>City Corporation</td>
	<td><?=$data['q11_registrar_id']['07']?></td>
</tr>
<tr>
	<td>PSA</td>
	<td><?=$data['q11_registrar_id']['08']?></td>
</tr>
<tr>
	<td>Union Parishad</td>
	<td><?=$data['q11_registrar_id']['09']?></td>
</tr>
<tr>
	<td>NGO</td>
	<td><?=$data['q11_registrar_id']['10']?></td>
</tr>
<tr>
	<td>Others</td>
	<td><?=$data['q11_registrar_id']['11']?></td>
</tr>
<tr>
	<td>No Information</td>
	<td><?=$data['q11_registrar_id']['99']?></td>
</tr>
</table>


<h4>Q12_YEAR_OF_START</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q12_year_of_start']?></td>
</tr>	
</table>


<h4>Q13_SALE_PROCEDURE</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>


<tr>
	<td>Total Null</td>
	<td><?=$data['q13_sale_procedure']['null']?></td>
</tr>	

<tr>
	<td>Retail</td>
	<td><?=$data['q13_sale_procedure']['1']?></td>
</tr>	


<tr>
	<td>Wholesale</td>
	<td><?=$data['q13_sale_procedure']['2']?></td>
</tr>	


<tr>
	<td>Not applicable</td>
	<td><?=$data['q13_sale_procedure']['3']?></td>
</tr>	


<tr>
	<td>No Information</td>
	<td><?=$data['q13_sale_procedure']['9']?></td>
</tr>	


</table>


<h4>Q14_IS_ACCOUNTABLE</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>


<tr>
	<td>Total Null</td>
	<td><?=$data['q14_is_accountable']['null']?></td>
</tr>	

<tr>
	<td>Yes</td>
	<td><?=$data['q14_is_accountable']['1']?></td>
</tr>	


<tr>
	<td>No</td>
	<td><?=$data['q14_is_accountable']['2']?></td>
</tr>	

<tr>
	<td>No Information</td>
	<td><?=$data['q14_is_accountable']['9']?></td>


</table>


<h4>Q14_ACCOUNTABLE_DURATION</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q14_accountable_duration']['null']?></td>
</tr>

<tr>
	<td>Total 0</td>
	<td><?=$data['q14_accountable_duration']['0']?></td>
</tr>	


<tr>
	<td>Daily</td>
	<td><?=$data['q14_accountable_duration']['1']?></td>
</tr>	


<tr>
	<td>Monthly</td>
	<td><?=$data['q14_accountable_duration']['2']?></td>
</tr>

<tr>
	<td>Yearly</td>
	<td><?=$data['q14_accountable_duration']['3']?></td>
</tr>	

<tr>
	<td>Others</td>
	<td><?=$data['q14_accountable_duration']['4']?></td>
</tr>	

<tr>
	<td>No Information</td>
	<td><?=$data['q14_accountable_duration']['9']?></td>
</tr>	

</table>


<h4>Q15_SALARY_INSTR</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>


<tr>
	<td>Total Null</td>
	<td><?=$data['q15_salary_instr']['null']?></td>
</tr>	

<tr>
	<td>Cheque</td>
	<td><?=$data['q15_salary_instr']['1']?></td>
</tr>	


<tr>
	<td>Cash</td>
	<td><?=$data['q15_salary_instr']['2']?></td>
</tr>

<tr>
	<td>Others</td>
	<td><?=$data['q15_salary_instr']['3']?></td>
</tr>	

<tr>
	<td>No Information</td>
	<td><?=$data['q15_salary_instr']['9']?></td>
</tr>	

</table>



<h4>Q15_SALARY_PERIOD</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">


<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q15_salary_period']['null']?></td>
</tr>	

<tr>
	<td>Daily</td>
	<td><?=$data['q15_salary_period']['1']?></td>
</tr>	


<tr>
	<td>Weekly</td>
	<td><?=$data['q15_salary_period']['2']?></td>
</tr>

<tr>
	<td>Monthly</td>
	<td><?=$data['q15_salary_period']['3']?></td>
</tr>	

<tr>
	<td>Others</td>
	<td><?=$data['q15_salary_period']['4']?></td>
</tr>

<tr>
	<td>Not applicable</td>
	<td><?=$data['q15_salary_period']['5']?></td>
</tr>

<tr>
	<td>No Information</td>
	<td><?=$data['q15_salary_period']['9']?></td>
</tr>	

</table>



<h4>Q16_FIXED_CAPITAL</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['q4_unit_type']['total']?></td>
</tr>


<tr>
	<td>Total Null</td>
	<td><?=$data['q16_fixed_capital']['null']?></td>
</tr>	

<tr>
	<td>Up to 5 lac</td>
	<td><?=$data['q16_fixed_capital']['1']?></td>
</tr>	


<tr>
	<td>5 - 50 lac</td>
	<td><?=$data['q16_fixed_capital']['2']?></td>
</tr>

<tr>
	<td>50 lac - 1 Crore</td>
	<td><?=$data['q16_fixed_capital']['3']?></td>
</tr>	

<tr>
	<td>1 Crore - 10 Crore</td>
	<td><?=$data['q16_fixed_capital']['4']?></td>
</tr>

<tr>
	<td>10 Crore - 15 Crore </td>
	<td><?=$data['q16_fixed_capital']['5']?></td>
</tr>	

<tr>
	<td>15 Crore - 30 Crore</td>
	<td><?=$data['q16_fixed_capital']['6']?></td>
</tr>

<tr>
	<td>30 Crore + </td>
	<td><?=$data['q16_fixed_capital']['7']?></td>
</tr>	


<tr>
	<td>No Information</td>
	<td><?=$data['q16_fixed_capital']['9']?></td>
</tr>	

</table>


<h4>Q18_MACHINE_USES (BSIC CODE < 3400)</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['production']['total']?></td>
</tr>


<tr>
	<td>Total Null</td>
	<td><?=$data['q18_machine_uses']?></td>
</tr>	
</table>


<h4>Q19_MARKETING (BSIC CODE < 3400)</h4> 

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['production']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q19_marketing']?></td>
</tr>	
</table>


<h4>Q20_FUEL_USES (BSIC CODE < 3400)</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Unit</td>
	<td><?=$data['production']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q20_fuel_uses']?></td>
</tr>	
</table>


<h4>Q21_IS_IT_ENABLED (BSIC CODE < 3400)</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Unit</td>
	<td><?=$data['production']['total']?></td>
</tr>

<tr>
	<td>Total Null</td>
	<td><?=$data['q21_is_it_enabled']?></td>
</tr>	
</table>

<h4>Q22_IS_FIRE_SECURED (BSIC CODE < 3400)</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q22_is_fire_secured']?></td>
</tr>	
</table>


<h4>Q22_IS_FIRE_DEVICE_MAINTAINED (BSIC CODE < 3400)</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

	<tr>
		<td>Total Null</td>
		<td><?=$data['q22_is_fire_device_maintained']?></td>
	</tr>

</table>

<h4>Q23_IS_GARBAGE_PROPER (BSIC CODE < 3400) </h4> 

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">

<tr>
	<td>Total Null</td>
	<td><?=$data['q23_is_garbage_proper']?></td>
</tr>	
</table>

<h4>Q24_IS_TOILET_AVAILABLE  (BSIC CODE < 3400) </h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q24_is_toilet_available']?></td>
</tr>	
</table>

<h4>Q24_IS_LADIES_TOILET_AVAILABLE  (BSIC CODE < 3400) </h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q24_is_ladies_toilet_available']?></td>
</tr>	
</table>

<h4>Q25_IS_TIN_REGISTERED</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q25_is_tin_registered']?></td>
</tr>	
</table>

<h4>Q26_IS_VAT_REGISTERED</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q26_is_vat_registered']?></td>
</tr>	
</table>

<h4>Q27_YEAR_VAT_REGISTERED</h4>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:50%;" id="tblExport">
<tr>
	<td>Total Null</td>
	<td><?=$data['q27_year_vat_registered']?></td>
</tr>	
</table>

</div>

<div>	
<input type="button" value="Print" id="print_btn">
</div>


<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>


