// JS file for  view/QuesCheck/Edit_details

$(document).ready(function() {

	if($('#QuestionaireQ10IsNbrInvestment').val() == "1") {

		$("#QuestionaireQ10NbrAmountInThou").removeAttr("disabled");

	}

	if($('#QuestionaireQ11IsRegistered').val() == "1") {

		$("#QuestionaireQ11RegistrarId").removeAttr("disabled");

	}
	if($('#QuestionaireQ14IsAccountable').val() == "1") {

		$("#QuestionaireQ14AccountableDuration").removeAttr("disabled");

	}
	if($('#QuestionaireQ22IsFireSecured').val() == "1") {

		$("#QuestionaireQ22IsFireDeviceMaintained").removeAttr("disabled");
	}

	if($('#QuestionaireQ24IsToiletAvailable').val() == "1") {

		$("#QuestionaireQ24IsLadiesToiletAvailable").removeAttr("disabled");
	}
	if($('#QuestionaireQ26IsVatRegistered').val() == "1") {

		$("#QuestionaireQ27YearVatRegistered").removeAttr("disabled");
	}

	if($('#QuestionaireQ4UnitType').val() == "1") {

		$("#QuestionaireQ4UnitOrgType").attr("disabled", "disabled");
		$("#QuestionaireQ9LegalEntityTypeId").attr("disabled", "disabled");

	} else {
		$("#QuestionaireQ4UnitOrgType").removeAttr("disabled");
		$("#QuestionaireQ9LegalEntityTypeId").removeAttr("disabled");
	}

	// $('#q3unitheadheducation').html($('#QuestionaireQ3UnitHeadEducationId').val());
	$('#q9details').html(option_q9[$('#QuestionaireQ9LegalEntityTypeId').val()]);
	$('#q10_details').html(option_q10[$('#QuestionaireQ10IsNbrInvestment').val()]);
	$('#q11details').html(option_q11[$('#QuestionaireQ11IsRegistered').val()]);
	$('#q11_1details').html(option_q11_1[$('#QuestionaireQ11RegistrarId').val()]);
	$('#q13details').html(option_q13[$('#QuestionaireQ13SaleProcedure').val()]);
	$('#q14details').html(option_q14[$('#QuestionaireQ14IsAccountable').val()]);
	$('#q14_1details').html(option_q14_1[$('#QuestionaireQ14AccountableDuration').val()]);
	$('#q15_1details').html(option_q15_1[$('#QuestionaireQ15SalaryInstr').val()]);
	$('#q15_2details').html(option_q15_2[$('#QuestionaireQ15SalaryPeriod').val()]);
	$('#q16details').html(option_q16[$('#QuestionaireQ16FixedCapital').val()]);
	$('#q18details').html(option_q18[$('#QuestionaireQ18MachineUses').val()]);
	$('#q19details').html(option_q19[$('#QuestionaireQ19Marketing').val()]);
	$('#q20details').html(option_q20[$('#QuestionaireQ20FuelUses').val()]);
	$('#q25details').html(option_q25[$('#QuestionaireQ25IsTinRegistered').val()]);

	$('#q21details').html(option_yes_no[$('#QuestionaireQ21IsItEnabled').val()]);
	$('#q22details').html(option_yes_no[$('#QuestionaireQ22IsFireSecured').val()]);
	$('#q22_1details').html(option_yes_no[$('#QuestionaireQ22IsFireDeviceMaintained').val()]);
	$('#q23details').html(option_yes_no[$('#QuestionaireQ23IsGarbageProper').val()]);
	$('#q24details').html(option_yes_no[$('#QuestionaireQ24IsToiletAvailable').val()]);
	$('#q24_1details').html(option_yes_no[$('#QuestionaireQ24IsLadiesToiletAvailable').val()]);
	$('#q25details').html(option_yes_no[$('#QuestionaireQ25IsTinRegistered').val()]);
	$('#q26details').html(option_yes_no[$('#QuestionaireQ26IsVatRegistered').val()]);

	var q6value = $('#QuestionaireQ6EconomyId').val();

	if(parseInt(q6value, 10) >= 111 && parseInt(q6value, 10) <= 3412) {
		q7enable();
		q8enable();
		q24enable();
		if(q6value.length == 4) {
		}
		autoFocusQ = 18;
		return false;
	}

	//q8enable();
	if((parseInt(q6value, 10) >= 3413 && parseInt(q6value, 10) <= 3509) || parseInt(q6value, 10) > 9900) {

		if(q6value.length == 4) {
			q7disable();
			q8disable();
			$(this).val("");
			alert("ভুল শিল্প কোড");
			autoFocusQ = 25;

		} else {

			if(q6value.length == 4) {
				q7disable();
				q8enable();
				autoFocusQ = 25;
			}
		}
	}
}); 