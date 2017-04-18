$(document).ready(function() {
	$("#QuestionaireQ1UnitSerialNo").mouseup(function() {
		if($('#QuestionaireQ1GeoCodeMauzaId').val() == '')
			autoFocus("QuestionaireQ1GeoCodeMauzaId");
	});

	$("#QuestionaireQ2UnitName").mouseup(function() {
		if($('#QuestionaireQ1UnitSerialNo').val() == '')
			autoFocus("QuestionaireQ1UnitSerialNo");
	});

	$("#QuestionaireQ2VillageMaholla").mouseup(function() {
		if($('#QuestionaireQ2UnitName').val() == '')
			autoFocus("QuestionaireQ2UnitName");
	});

	$("#QuestionaireQ2HomeMarket").mouseup(function() {
		if($('#QuestionaireQ2VillageMaholla').val() == '')
			autoFocus("QuestionaireQ2VillageMaholla");
	});

	$("#QuestionaireQ3UnitHeadGender").mouseup(function() {
		if($('#QuestionaireQ2UnitName').val() == '' || $('#QuestionaireQ2VillageMaholla').val() == '')
			autoFocus("QuestionaireQ2VillageMaholla");
	});

	$("#QuestionaireQ3UnitHeadEducationId").mouseup(function() {
		if($('#QuestionaireQ3UnitHeadGender').val() == '')
			autoFocus("QuestionaireQ3UnitHeadGender");
	});

	$("#QuestionaireQ3UnitHeadAge").mouseup(function() {
		var val = $('#QuestionaireQ3UnitHeadEducationId').val();
		if(val.length != 2) {
			autoFocus("QuestionaireQ3UnitHeadEducationId");
			$("#QuestionaireQ3UnitHeadAge").val("");
		}
	});

	$("#QuestionaireQ4UnitType").mouseup(function() {
		var val = $('#QuestionaireQ3UnitHeadAge').val();
		if(val.length != 2)
			autoFocus("QuestionaireQ3UnitHeadAge");
	});

	$("#QuestionaireQ5UnitHeadEconomyId").mouseup(function() {
		if($('#QuestionaireQ4UnitType').val() == '')
			autoFocus("QuestionaireQ4UnitType");
	});

	$("#QuestionaireQ6EconomyDescription").mouseup(function() {
		if($('#QuestionaireQ5UnitHeadEconomyId').val() == '')
			autoFocus("QuestionaireQ5UnitHeadEconomyId");
	});

	$("#QuestionaireQ6EconomyId").mouseup(function() {
		if($('#QuestionaireQ6EconomyDescription').val() == '')
			autoFocus("QuestionaireQ6EconomyDescription");
	});

	$("#QuestionaireQ9LegalEntityTypeId").mouseup(function() {
		if($('#QuestionaireQ6EconomyId').val() == '')
			autoFocus("QuestionaireQ6EconomyId");
	});

	$("#QuestionaireQ10IsNbrInvestment").mouseup(function() {
		if($('#QuestionaireQ9LegalEntityTypeId').is(':disabled')) {
			//textbox is disabled
		} else {
			if($('#QuestionaireQ9LegalEntityTypeId').val() == '')
				autoFocus("QuestionaireQ9LegalEntityTypeId");
		}

	});

	$("#QuestionaireQ11IsRegistered").mouseup(function() {
		if($('#QuestionaireQ10IsNbrInvestment').val() == '') {
			autoFocus("QuestionaireQ10IsNbrInvestment");
		} else if($("#QuestionaireQ10IsNbrInvestment").val() == 1) {
			var value = $("#QuestionaireQ10NbrAmountInThou").val();
			var valueInt = parseInt(value, 10);

			if(valueInt <= 0) {
				autoFocus("QuestionaireQ10NbrAmountInThou");
			}
		};
	});

	$("#QuestionaireQ13SaleProcedure").mouseup(function() {
		if($('#QuestionaireQ12YearOfStart').val() == '')
			autoFocus("QuestionaireQ12YearOfStart");
	});

	$("#QuestionaireQ14IsAccountable").mouseup(function() {
		if($('#QuestionaireQ13SaleProcedure').val() == '')
			autoFocus("QuestionaireQ13SaleProcedure");
	});

	$("#QuestionaireQ15SalaryInstr").mouseup(function() {
		if($('#QuestionaireQ14IsAccountable').val() == '')
			autoFocus("QuestionaireQ14IsAccountable");
	});

	$("#QuestionaireQ15SalaryPeriod").mouseup(function() {
		if($('#QuestionaireQ15SalaryInstr').val() == '')
			autoFocus("QuestionaireQ15SalaryInstr");
	});

	$("#QuestionaireQ16FixedCapital").mouseup(function() {
		if($('#QuestionaireQ15SalaryInstr').val() == '' || $('#QuestionaireQ15SalaryPeriod').val() == '')
			autoFocus("QuestionaireQ15SalaryInstr");
	});

	$("#QuestionaireQ17HrMale").mouseup(function() {
		if($('#QuestionaireQ16FixedCapital').val() == '')
			autoFocus("QuestionaireQ16FixedCapital");
	});

	// Table 4================================================

	$("#QuestionaireQ19Marketing").mouseup(function() {
		if($('#QuestionaireQ18MachineUses').val() == '')
			autoFocus("QuestionaireQ18MachineUses");
	});

	$("#QuestionaireQ20FuelUses").mouseup(function() {
		if($('#QuestionaireQ19Marketing').val() == '')
			autoFocus("QuestionaireQ19Marketing");
	});

	$("#QuestionaireQ21IsItEnabled").mouseup(function() {
		if($('#QuestionaireQ20FuelUses').val() == '')
			autoFocus("QuestionaireQ20FuelUses");
	});

	$("#QuestionaireQ22IsFireSecured").mouseup(function() {
		if($('#QuestionaireQ21IsItEnabled').val() == '')
			autoFocus("QuestionaireQ21IsItEnabled");
	});

	$("#QuestionaireQ22IsFireDeviceMaintained").mouseup(function() {
		if($('#QuestionaireQ21IsItEnabled').val() == '')
			autoFocus("QuestionaireQ21IsItEnabled");
	});

	$("#QuestionaireQ23IsGarbageProper").mouseup(function() {
		if($('#QuestionaireQ22IsFireSecured').val() == '')
			autoFocus("QuestionaireQ22IsFireSecured");
	});

	$("#QuestionaireQ24IsToiletAvailable").mouseup(function() {
		if($('#QuestionaireQ23IsGarbageProper').val() == '')
			autoFocus("QuestionaireQ23IsGarbageProper");
	});

	$("#QuestionaireQ24IsLadiesToiletAvailable").mouseup(function() {
		if($('#QuestionaireQ24IsToiletAvailable').val() == '')
			autoFocus("QuestionaireQ24IsToiletAvailable");
	});

	$("#QuestionaireQ25IsTinRegistered").mouseup(function() {
		if($('#QuestionaireQ24IsToiletAvailable').val() == '')
			autoFocus("QuestionaireQ24IsToiletAvailable");
	});

	$("#QuestionaireQ26IsVatRegistered").mouseup(function() {
		if($('#QuestionaireQ25IsTinRegistered').val() == '')
			autoFocus("QuestionaireQ25IsTinRegistered");
	});

	$("#QuestionaireQ27YearVatRegistered").mouseup(function() {
		if($('#QuestionaireQ26IsVatRegistered').val() == '')
			autoFocus("QuestionaireQ26IsVatRegistered");
	});

	//QUESTION 17================================================
	
	$("#QuestionaireQ17HrFemale").mouseup(function() {
		if($('#QuestionaireQ17HrMale').val() == '')
			autoFocus("QuestionaireQ17HrMale");
	});

	$("#QuestionaireQ17HrMaleFoc").mouseup(function() {
		if($('#QuestionaireQ17HrFemale').val() == '')
			autoFocus("QuestionaireQ17HrFemale");
	});

	$("#QuestionaireQ17HrFemaleFoc").mouseup(function() {
		if($('#QuestionaireQ17HrMaleFoc').val() == '')
			autoFocus("QuestionaireQ17HrMaleFoc");
	});

	$("#QuestionaireQ17HrMaleFulltime").mouseup(function() {
		if($('#QuestionaireQ17HrFemaleFoc').val() == '')
			autoFocus("QuestionaireQ17HrFemaleFoc");
	});

	$("#QuestionaireQ17HrFemaleFulltime").mouseup(function() {
		if($('#QuestionaireQ17HrMaleFulltime').val() == '')
			autoFocus("QuestionaireQ17HrMaleFulltime");
	});

	$("#QuestionaireQ17HrMaleParttime").mouseup(function() {
		if($('#QuestionaireQ17HrFemaleFulltime').val() == '')
			autoFocus("QuestionaireQ17HrFemaleFulltime");
	});

	$("#QuestionaireQ17HrFemaleParttime").mouseup(function() {
		if($('#QuestionaireQ17HrMaleParttime').val() == '')
			autoFocus("QuestionaireQ17HrMaleParttime");
	});

	$("#QuestionaireQ17HrMaleIrregular").mouseup(function() {
		if($('#QuestionaireQ17HrFemaleParttime').val() == '')
			autoFocus("QuestionaireQ17HrFemaleParttime");
	});

	$("#QuestionaireQ17HrFemaleIrregular").mouseup(function() {
		if($('#QuestionaireQ17HrMaleIrregular').val() == '')
			autoFocus("QuestionaireQ17HrMaleIrregular");
	});

}); 