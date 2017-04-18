$(document).ready(function() {
	//AUTO NAVIGATION OF CURSOR BLOCK=================================================

	$('#QuestionaireQ1UnitSerialNo').keyup(function() {
		var value = $(this).val();
		if(value.length == 3) {
			autoFocus("QuestionaireQ2UnitName");
		}
	});

	$('#QuestionaireQ1GeoCodeMauzaId').keyup(function() {
		var value = $(this).val();
		if(value.length == 3) {
			autoFocus("QuestionaireQ1UnitSerialNo");
		}
	});

	$('#QuestionaireQ3UnitHeadEducationId').keyup(function() {
		var value = $(this).val();
		if(value.length == 2) {
			autoFocus("QuestionaireQ3UnitHeadAge");
		}
	});

	$('#QuestionaireQ3UnitHeadAge').keyup(function() {
		var value = $(this).val();
		var education = parseInt($(this).val(), 10);

		var age = parseInt($('#QuestionaireQ3UnitHeadEducationId').val(), 10);
		age += 4;

		if(value.length == 2) {

			if(education <= age && $('#QuestionaireQ3UnitHeadEducationId').val() != "99") {
				$(this).val("");
			} else {
				autoFocus("QuestionaireQ4UnitType");
			}

		}
	});

	$('#QuestionaireQ5UnitHeadEconomyId').keyup(function() {
		var value = $(this).val();
		var myval = parseInt($(this).val(), 10);

		if(value.length == 2) {
			if($('#QuestionaireQ4UnitType').val() == '1') {
				if(myval == 1) {
					$('#QuestionaireQ5UnitHeadEconomyId').val("");
					return false;
				} else {
					autoFocus("QuestionaireQ6EconomyDescription");
					return false;
				}
			}

			autoFocus("QuestionaireQ6EconomyDescription");

		}
	});

});
