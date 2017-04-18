$(document).ready(function() {

	// TAB VALIDATION FOR SECTION TWO- NO BLANK FIELD ALLOWED
	$("#QuestionaireQ2UnitName,#QuestionaireQ2VillageMaholla,#QuestionaireQ6EconomyDescription,#QuestionaireQ3UnitHeadGender,#QuestionaireQ3UnitHeadEducationId,#QuestionaireQ4UnitType, #QuestionaireQ4UnitOrgType,#QuestionaireQ10IsNbrInvestment,#QuestionaireQ10NbrAmountInThou,#QuestionaireQ11IsRegistered,#QuestionaireQ18MachineUses,#QuestionaireQ19Marketing,#QuestionaireQ20FuelUses, #QuestionaireQ21IsItEnabled, #QuestionaireQ22IsFireSecured, #QuestionaireQ22IsFireDeviceMaintained,#QuestionaireQ23IsGarbageProper,#QuestionaireQ24IsToiletAvailable,#QuestionaireQ24IsLadiesToiletAvailable,#QuestionaireQ25IsTinRegistere,#QuestionaireQ26IsVatRegistered, #QuestionaireQ12YearOfStart, #QuestionaireQ13SaleProcedure,#QuestionaireQ14IsAccountable,#QuestionaireQ14AccountableDuration,#QuestionaireQ15SalaryInstr,#QuestionaireQ15SalaryPeriod,#QuestionaireQ16FixedCapital,#QuestionaireQ25IsTinRegistered,#QuestionaireQ27YearVatRegistered").live("keydown", function(e) {
		var key = e.charCode || e.keyCode || 0;
		if($(this).val() == '' && key == 9)
			return (key != 9);
	});

	// TAB VALIDATION FOR SECTION NINE - 2 DIGIT
	$("#QuestionaireQ9LegalEntityTypeId, #QuestionaireQ17HrMale, #QuestionaireQ17HrFemale, #QuestionaireQ17HrMaleFoc, #QuestionaireQ17HrFemaleFoc, #QuestionaireQ17HrMaleFulltime, #QuestionaireQ17HrFemaleFulltime, #QuestionaireQ17HrMaleParttime, #QuestionaireQ17HrFemaleParttime, #QuestionaireQ17HrMaleIrregular, #QuestionaireQ17HrFemaleIrregular").live("keydown", function(e) {
		var key = e.charCode || e.keyCode || 0;
		var val = $(this).val();
		if(val.length != 2 && key == 9)
			return (key != 9);
	});

	// TAB VALIDATION FOR SECTION ONE - 3 DIGIT
	$("#QuestionaireQ1GeoCodeMauzaId,#QuestionaireQ1UnitSerialNo").live("keydown", function(e) {
		var key = e.charCode || e.keyCode || 0;
		var val = $(this).val();
		if(val.length != 3 && key == 9)
			return (key != 9);
	});

	// TAB VALIDATION FOR SECTION THREE | FIVE | NINE | ELEVEN  - 2 DIGIT
	$("#QuestionaireQ3UnitHeadEducationId,#QuestionaireQ3UnitHeadAge,#QuestionaireQ5UnitHeadEconomyId,#QuestionaireQ11RegistrarId").live("keydown", function(e) {
		var key = e.charCode || e.keyCode || 0;
		var val = $(this).val();
		if(val.length != 2 && key == 9)
			return (key != 9);

		var key = e.charCode || e.keyCode || 0;
		// allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
		return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
	});

	// TAB VALIDATION FOR SECTION SIX - 4 DIGIT
	$("#QuestionaireQ6EconomyId").live("keydown", function(e) {

		var key = e.charCode || e.keyCode || 0;
		var val = $(this).val();
		if(val.length != 4 && key == 9)
			return (key != 9);

		var key = e.charCode || e.keyCode || 0;
		// allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
		return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));

	});

	// TAB VALIDATION FOR SECTION 10.1 - 7 DIGIT
	$("#QuestionaireQ10NbrAmountInThou").live("keydown", function(e) {

		var key = e.charCode || e.keyCode || 0;
		var val = $(this).val();

		if(val.length < 7 && key == 9)
			return (key != 9);

		var key = e.charCode || e.keyCode || 0;
		// allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
		return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));

	});

}); 