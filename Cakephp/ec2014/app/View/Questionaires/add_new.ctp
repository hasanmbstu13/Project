<?php echo $this -> Session -> flash(); ?>
<br/>
<style>
	input[type=number]:focus {
		background-color: #F6FCB3
	}

	div#invalidCode {
		color: red;
	}

</style>

<script>
	//BUILDING ALL FUNCTIONS AND ARRAY

	var option_q9 = new Array();
	var option_q11 = new Array();
	var option_q16 = new Array();
	var option_q13 = new Array();
	var option_q14 = new Array();
	var option_q14_1 = new Array();
	var option_q15_1 = new Array();
	var option_q15_2 = new Array();
	var option_q25 = new Array();
	var autoFocusQ = "";

	function return_function(key) {
		return (key != 9);
	}

	function alert_function() {
		alert("This field is required");
	}

	function autoFocus(id) {
		$("#" + id).focus();
	}

	/***********************************************************************
	 /*     FUNCTIONS FOR ENABLE & DISABLE FIELD
	 ************************************************************************/

	function q7enable() {
		$("#QuestionaireQ7ProductDesc1").removeAttr("disabled");
		$("#QuestionaireQ7ProductDesc2").removeAttr("disabled");
		$("#QuestionaireQ7ProductDesc3").removeAttr("disabled");
		$("#QuestionaireQ7ProductDesc4").removeAttr("disabled");
		$("#QuestionaireQ7ProductId1").removeAttr("disabled");
		$("#QuestionaireQ7ProductId2").removeAttr("disabled");
		$("#QuestionaireQ7ProductId3").removeAttr("disabled");
		$("#QuestionaireQ7ProductId4").removeAttr("disabled");
	}

	function q7disable() {
		$("#QuestionaireQ7ProductDesc1").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductDesc2").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductDesc3").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductDesc4").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductId1").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductId2").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductId3").attr("disabled", "disabled");
		$("#QuestionaireQ7ProductId4").attr("disabled", "disabled");
	}

	function q8enable() {
		$("#QuestionaireQ8ServiceDesc1").removeAttr("disabled");
		$("#QuestionaireQ8ServiceDesc2").removeAttr("disabled");
		$("#QuestionaireQ8ServiceDesc3").removeAttr("disabled");
		$("#QuestionaireQ8ServiceDesc4").removeAttr("disabled");
		$("#QuestionaireQ8ServiceId1").removeAttr("disabled");
		$("#QuestionaireQ8ServiceId2").removeAttr("disabled");
		$("#QuestionaireQ8ServiceId3").removeAttr("disabled");
		$("#QuestionaireQ8ServiceId4").removeAttr("disabled");
	}

	function q8disable() {
		$("#QuestionaireQ8ServiceDesc1").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceDesc2").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceDesc3").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceDesc4").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceId1").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceId2").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceId3").attr("disabled", "disabled");
		$("#QuestionaireQ8ServiceId4").attr("disabled", "disabled");
	}

	function q24enable() {
		$("#QuestionaireQ18MachineUses").removeAttr("disabled");
		$("#QuestionaireQ19Marketing").removeAttr("disabled");
		$("#QuestionaireQ20FuelUses").removeAttr("disabled");
		$("#QuestionaireQ21IsItEnabled").removeAttr("disabled");
		$("#QuestionaireQ22IsFireSecured").removeAttr("disabled");
		$("#QuestionaireQ23IsGarbageProper").removeAttr("disabled");
		$("#QuestionaireQ24IsToiletAvailable").removeAttr("disabled");
	}

	function q24disable() {
		$("#QuestionaireQ18MachineUses").attr("disabled", "disabled");
		$("#QuestionaireQ19Marketing").attr("disabled", "disabled");
		$("#QuestionaireQ20FuelUses").attr("disabled", "disabled");
		$("#QuestionaireQ21IsItEnabled").attr("disabled", "disabled");
		$("#QuestionaireQ22IsFireSecured").attr("disabled", "disabled");
		$("#QuestionaireQ23IsGarbageProper").attr("disabled", "disabled");
		$("#QuestionaireQ24IsToiletAvailable").attr("disabled", "disabled");
	}

	/**********************************************************************************
	 *                                  JAVASCRIPT START HERE
	 ***********************************************************************************/
	$(document).ready(function() {
		$('#QuestionaireAddForm')[0].reset();
		//CHANGE INPUT FIELD COLOR

		$('input:text, select, textarea').focus(function() {
			$(this).css({
				'background-color' : '#F6FCB3'
			});
		});

		$('input:text, select, textarea').blur(function() {
			$(this).css({
				'background-color' : '#fff'
			});
		});

		/***********************************************************************************
		 * SECTION : 9 & 23 & 14 & 15 &  11.1 & 16
		 ************************************************************************************/
		//  Options For Section 9
		option_q9[1] = 'পারিবারিক/ব্যক্তিগত-01';
		option_q9[2] = 'অংশিদারিত্ত-02';
		option_q9[3] = 'প্রাইভেট লি-03';
		option_q9[4] = 'পাবলিক লি-04';
		option_q9[5] = 'সরকারি-05';
		option_q9[6] = 'শায়িত্তশাসিত-06';
		option_q9[7] = 'বিদেশি-07';
		option_q9[8] = 'যৌথ-08';
		option_q9[9] = 'সমবায়-09';
		option_q9[10] = 'এনপিআই-10';
		option_q9[11] = 'প্রবাসী বাংলাদেশি-11';
		option_q9[12] = 'অন্যান্য-12';

		//Section : 9 Event
		$('#QuestionaireQ9LegalEntityTypeId').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value.length == 2) {
				if($(this).val() < 01 || $(this).val() > 12) {
					$(this).val("");
					return false;
				} else {
					autoFocus("QuestionaireQ10IsNbrInvestment");
					$('#q9details').html(option_q9[val2]);
				}
			} else {
				$('#q9details').html("");
			}
		});

		//  Options For Section 11    ******************************************************************
		option_q11[1] = 'জয়েন্ট স্টক কোম্পানী-01';
		option_q11[2] = 'বিনিয়োগ বোর্ড-02';
		option_q11[3] = 'বিসিক-03';
		option_q11[4] = 'বেপজা-04';
		option_q11[5] = 'কলকারখানা পরিদর্শন পরিদপ্তর-05';
		option_q11[6] = 'সমবায় অফিস-06';
		option_q11[7] = 'সিটি কর্পোরেশন-07';
		option_q11[8] = 'পৌরসভা-08';
		option_q11[9] = 'উনিয়ন পরিষদ-09';
		option_q11[10] = 'এনজিও ব্যুরো-10';
		option_q11[11] = 'অন্যান্য-11';

		// Section :11 EVENT
		$('#QuestionaireQ11RegistrarId').keyup(function() {
			var value = $(this).val();
			var val2 = parseInt(value, 10);
			if(value.length == 2) {

				// Range cheking
				if($(this).val() < 01 || $(this).val() > 11) {
					$(this).val("");
					return false;
				} else {
					autoFocus("QuestionaireQ12YearOfStart");
					$('#q11_1details').html(option_q11[val2]);
				}
			} else {
				$('#q11_1details').html("");
			}
		});

		//  Options For Section 16  **********************************************************************
		option_q16[1] = '৫ লাখ টাকা পর্যন্ত';
		option_q16[2] = '৫ - ৫০ লাখ টাকা পর্যন্ত';
		option_q16[3] = '৫০ লাখ - ১ কোটি টাকা পর্যন্ত';
		option_q16[4] = '১-১০ কোটি টাকা পর্যন্ত';
		option_q16[5] = '১০-১৫ কোটি টাকা পর্যন্ত';
		option_q16[6] = '১৫-৩০ কোটি টাকা পর্যন্ত';
		option_q16[7] = '৩০ কোটি +';

		//SECTION 16
		$('#QuestionaireQ16FixedCapital').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value >= 1 && value <= 7) {
				autoFocus("QuestionaireQ17HrMale");

				$('#q16details').html(option_q16[val2]);
			} else {
				$('#QuestionaireQ16FixedCapital').val("");
				$('#q16details').html("");
			}
		});

		// Options For Section 13  ************************************************************************
		option_q13[1] = 'খুচরা...1';
		option_q13[2] = 'পাইকারি...2';
		option_q13[3] = 'প্রযোজ্য নয়...3';

		// Section 13 : Event
		$('#QuestionaireQ13SaleProcedure').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value >= 1 && value <= 3) {
				autoFocus("QuestionaireQ14IsAccountable");
				$('#q13details').html(option_q13[val2]);
			} else {
				$('#QuestionaireQ13SaleProcedure').val("");
				$('#q13details').html("");
			}
		});

		// Options For Section 14   **********************************************************************
		option_q14[1] = 'হ্যাঁ...1';
		option_q14[2] = 'না...2';

		// Section 14 : Event
		$('#QuestionaireQ14IsAccountable').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value == 1) {
				$("#QuestionaireQ14AccountableDuration").removeAttr("disabled");
				autoFocus("QuestionaireQ14AccountableDuration");

				$('#q14details').html(option_q14[val2]);
			} else if(value == 2) {
				autoFocus("QuestionaireQ15SalaryInstr");
				$("#QuestionaireQ14AccountableDuration").attr("disabled", "disabled");
				$('#q14details').html(option_q14[val2]);
			} else {
				$('#QuestionaireQ14IsAccountable').val("");
				$('#q14details').html("");

			}

		});

		// Options For Section 14_1  *******************************************************************
		option_q14_1[1] = '1-দৈনিক';
		option_q14_1[2] = '2-মাসিক';
		option_q14_1[3] = '3-বাৎসরিক';
		option_q14_1[4] = '4-অন্যান্য';

		// Section 14_1 : Event
		$('#QuestionaireQ14AccountableDuration').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value >= 1 && value <= 4) {
				autoFocus("QuestionaireQ15SalaryInstr");

				$('#q14_1details').html(option_q14_1[val2]);
			} else {
				$('#QuestionaireQ14AccountableDuration').val("");
				$('#q14_1details').html("");
			}
		});

		// Options For Section 15_1   ******************************************************************
		option_q15_1[1] = '1-চেক';
		option_q15_1[2] = '2-নগদ';
		option_q15_1[3] = '3-অন্যান্য';

		// Section 15_1 : Event
		$('#QuestionaireQ15SalaryInstr').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value >= 1 && value <= 3) {
				autoFocus("QuestionaireQ15SalaryPeriod");

				$('#q15_1details').html(option_q15_1[val2]);
			} else {
				$('#QuestionaireQ15SalaryInstr').val("");
				$('#q15_1details').html("");
			}
		});

		// Options For Section 15_2  ***********************************************************************
		option_q15_2[1] = '1-দৈনিক';
		option_q15_2[2] = '2-সাপ্তাহিক';
		option_q15_2[3] = '3-মাসিক';
		option_q15_2[4] = '4-প্রযোজ্য নয়';

		// Section 15_2 : Event
		$('#QuestionaireQ15SalaryPeriod').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value >= 1 && value <= 5) {
				autoFocus("QuestionaireQ16FixedCapital");

				$('#q15_2details').html(option_q15_2[val2]);
			} else {
				$('#QuestionaireQ15SalaryPeriod').val("");
				$('#q15_2details').html("");
			}
		});

		// Options For Section 25 ***************************************************************************
		option_q25[1] = 'হ্যাঁ...1';
		option_q25[2] = 'না...2';
		//Event for  Section 25
		$('#QuestionaireQ25IsTinRegistered').keyup(function() {
			var value = $(this).val();

			var val2 = parseInt(value, 10);

			if(value >= 1 && value <= 2) {
				autoFocus("QuestionaireQ26IsVatRegistered");

				$('#q25details').html(option_q25[val2]);
			} else {
				$('#QuestionaireQ25IsTinRegistered').val("");
				$('#q25details').html("");
			}
		});
		//******************************** END 

		//NEUMERIC FIELDS ONLY ******************************************************************

		$("#QuestionaireQ1GeoCodeMauzaId,#QuestionaireQ1UnitSerialNo,#QuestionaireQ7ProductId1,#QuestionaireQ7ProductId2,#QuestionaireQ7ProductId3,#QuestionaireQ7ProductId4,#QuestionaireQ8ServiceId1,#QuestionaireQ8ServiceId2,#QuestionaireQ8ServiceId3,#QuestionaireQ8ServiceId4,#QuestionaireQ9LegalEntityTypeId,#QuestionaireQ12YearOfStart,#QuestionaireQ17HrMale,#QuestionaireQ17HrFemale,#QuestionaireQ17HrMaleFoc,#QuestionaireQ17HrFemaleFoc,#QuestionaireQ17HrMaleFulltime,#QuestionaireQ17HrFemaleFulltime,#QuestionaireQ17HrMaleParttime,#QuestionaireQ17HrFemaleParttime,#QuestionaireQ17HrMaleIrregular,#QuestionaireQ17HrFemaleIrregular,#QuestionaireQ27YearVatRegistered, #QuestionaireQ5UnitHeadEconomyId , #QuestionaireQ16FixedCapital").live("keydown", function(e) {
			var key = e.charCode || e.keyCode || 0;
			// allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
			return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
		});

		//BLANK FIELD ALERT MESSAGE

		$("#QuestionaireQ2HomeMarket,#QuestionaireQ2RoadNoName,#QuestionaireQ2HoldingNo").blur(function() {
			if($(this).val() == '')
				alert("This field is blank. Are you sure?");
		});

		/*****************************************************************************************
		 AUTO NAVIGATION OF CURSOR BLOCK
		 ******************************************************************************************/

		$('#QuestionaireQ1GeoCodeMauzaId').keyup(function() {
			var value = $(this).val();
			if(value.length == 3) {
				autoFocus("QuestionaireQ1UnitSerialNo");
			}

		});

		$('#QuestionaireQ1UnitSerialNo').keyup(function() {
			var value = $(this).val();
			if(value.length == 3) {
				autoFocus("QuestionaireQ2UnitName");
			}

		});

		// Section : 3

		//GENDER VALIDATION=============================================================
		$('#QuestionaireQ3UnitHeadEducationId').focus(function() {
			var value = $(this).val();
			if($('#QuestionaireQ3UnitHeadGender1').val() == "" && $('#QuestionaireQ3UnitHeadGender2').val() == "" && $('#QuestionaireQ3UnitHeadGender3').val() == "") {
				autoFocus("QuestionaireQ3UnitHeadGender1");
			}
		});

		$('#QuestionaireQ3UnitHeadGender1').keyup(function() {
			var value = $(this).val();
			if(value != "1") {
				$('#QuestionaireQ3UnitHeadGender1').val("");
				autoFocus("QuestionaireQ3UnitHeadGender1");
			} else {
				autoFocus("QuestionaireQ3UnitHeadEducationId");
				$('#QuestionaireQ3UnitHeadGender2').val("");
				$('#QuestionaireQ3UnitHeadGender3').val("");
			}
		});

		$('#QuestionaireQ3UnitHeadGender2').keyup(function() {
			var value = $(this).val();
			if(value != "2") {
				$('#QuestionaireQ3UnitHeadGender2').val("");
				autoFocus("QuestionaireQ3UnitHeadGender2");
			} else {
				autoFocus("QuestionaireQ3UnitHeadEducationId");
				$('#QuestionaireQ3UnitHeadGender1').val("");
				$('#QuestionaireQ3UnitHeadGender3').val("");
			}
		});

		$('#QuestionaireQ3UnitHeadGender3').keyup(function() {
			var value = $(this).val();
			if(value != "3") {
				$('#QuestionaireQ3UnitHeadGender3').val("");
				autoFocus("QuestionaireQ3UnitHeadGender3");
			} else {
				autoFocus("QuestionaireQ3UnitHeadEducationId");
				$('#QuestionaireQ3UnitHeadGender2').val("");
				$('#QuestionaireQ3UnitHeadGender1').val("");
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
			if(value.length == 2) {

				autoFocus("QuestionaireQ4UnitType");
			}

		});

		//END OF GENDER VALIDATION=============================================================

		// SECTION : 5
		$('#QuestionaireQ5UnitHeadEconomyId').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {
				autoFocus("QuestionaireQ6EconomyId");
			}
		});

		//Section : 7
		$('#QuestionaireQ7ProductId1').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ7ProductId2");
			}
		});

		$('#QuestionaireQ7ProductId2').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ7ProductId3");
			}
		});

		$('#QuestionaireQ7ProductId3').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ7ProductId4");
			}
		});

		$('#QuestionaireQ7ProductId4').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ9LegalEntityTypeId");
			}
		});

		// SECTION : 8
		$('#QuestionaireQ8ServiceId1').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ8ServiceId2");
			}
		});

		$('#QuestionaireQ8ServiceId2').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ8ServiceId3");
			}
		});

		$('#QuestionaireQ8ServiceId3').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ8ServiceId4");
			}
		});

		$('#QuestionaireQ8ServiceId4').keyup(function() {
			var value = $(this).val();
			if(value.length == 5) {
				autoFocus("QuestionaireQ9LegalEntityTypeId");
			}
		});

		// Section : 12
		$('#QuestionaireQ12YearOfStart').keyup(function() {
			var value = $(this).val();
			if(value.length == 4) {
				autoFocus("QuestionaireQ13SaleProcedure");
			}
		});

		// VALIDATION FOR  Section : 17
		$('#QuestionaireQ17HrMale').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {
				autoFocus("QuestionaireQ17HrFemale");
			}
		});

		$('#QuestionaireQ17HrFemale').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {
				autoFocus("QuestionaireQ17HrMaleFoc");
			}
		});

		$('#QuestionaireQ17HrMaleFoc').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {
				autoFocus("QuestionaireQ17HrFemaleFoc");
			}
		});

		$('#QuestionaireQ17HrFemaleFoc').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {
				autoFocus("QuestionaireQ17HrMaleFulltime");
			}
		});

		$('#QuestionaireQ17HrMaleFulltime').keyup(function() {
			var value = $(this).val();
			if(value.length == 4) {
				autoFocus("QuestionaireQ17HrFemaleFulltime");
			}
		});

		$('#QuestionaireQ17HrFemaleFulltime').keyup(function() {
			var value = $(this).val();
			if(value.length == 4) {
				autoFocus("QuestionaireQ17HrMaleParttime");
			}
		});

		$('#QuestionaireQ17HrMaleParttime').keyup(function() {
			var value = $(this).val();
			if(value.length == 3) {
				autoFocus("QuestionaireQ17HrFemaleParttime");
			}
		});

		$('#QuestionaireQ17HrFemaleParttime').keyup(function() {
			var value = $(this).val();
			if(value.length == 3) {
				autoFocus("QuestionaireQ17HrMaleIrregular");
			}
		});

		$('#QuestionaireQ17HrMaleIrregular').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {
				autoFocus("QuestionaireQ17HrFemaleIrregular");
			}
		});

		$('#QuestionaireQ17HrFemaleIrregular').keyup(function() {
			var value = $(this).val();
			if(value.length == 2) {

				var value = $('#QuestionaireQ17HrMale').val() + $('#QuestionaireQ17HrFemale').val() + $('#QuestionaireQ17HrMaleFoc').val() + $('#QuestionaireQ17HrFemaleFoc').val() + $('#QuestionaireQ17HrMaleFulltime').val() + $('#QuestionaireQ17HrFemaleFulltime').val() + $('#QuestionaireQ17HrMaleParttime').val() + $('#QuestionaireQ17HrFemaleParttime').val() + $('#QuestionaireQ17HrMaleIrregular').val() + $('#QuestionaireQ17HrFemaleIrregular').val();

				value = parseInt(value, 10);
				// console.log(value);
				if(value <= 0) {
					autoFocus("QuestionaireQ17HrMale");
					return false;
				}

				if(autoFocusQ == 18)
					autoFocus("QuestionaireQ18MachineUses");

				if(autoFocusQ == 25)
					autoFocus("QuestionaireQ25IsTinRegistered");

			}
		});

		/****************************************************************************************
		 /*
		 /*                              TAB VALIDATION SECTION
		 ***************************************************************************************/

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

		//  NON ZERO TAKING INPUT CODE AND AUTO FOCUS
		$('#QuestionaireQ10NbrAmountInThou').keyup(function() {
			var value = $(this).val();
			if(value.length == 7) {
				if(value == 0) {
					$(this).val("");
				} else {
					autoFocus("QuestionaireQ11IsRegistered");
				}

			}
		});

		// TAB VALIDATION FOR SECTION 7 & 8 - 5 DIGIT
		$("#QuestionaireQ7ProductId1,#QuestionaireQ7ProductId2,#QuestionaireQ7ProductId3,#QuestionaireQ7ProductId4,#QuestionaireQ8ServiceId1,#QuestionaireQ8ServiceId2,#QuestionaireQ8ServiceId3,#QuestionaireQ8ServiceId4").live("keydown", function(e) {
			var key = e.charCode || e.keyCode || 0;
			var val = $(this).val();

			if(val.length < 5 && val.length >= 1 && key == 9)
				return (key != 9);

		});

		//  TAB VALIDATION FOR SECTION TWO - BLANK CHECK
		$("#QuestionaireQ2UnitName,#QuestionaireQ2VillageMaholla,#QuestionaireQ4UnitType ,#QuestionaireQ10IsNbrInvestment,#QuestionaireQ13SaleProcedure,#QuestionaireQ14IsAccountable,#QuestionaireQ14AccountableDuration,#QuestionaireQ15SalaryInstr,#QuestionaireQ15SalaryPeriod,#QuestionaireQ16FixedCapital,#QuestionaireQ25IsTinRegistered,#QuestionaireQ26IsVatRegistered,#QuestionaireQ11IsRegistered").live("keydown", function(e) {
			var key = e.charCode || e.keyCode || 0;
			if($(this).val() == '' && key == 9)
				return (key != 9);
		});

		/**
		 **************************************************************************************
		 MOUSE VALIDATION SECTION
		 **************************************************************************************
		 */

		//REQUIRED FIELD VALIDATION FOR MOUSE
		$("#QuestionaireQ1UnitSerialNo").mouseup(function() {
			var val = $('#QuestionaireQ1GeoCodeMauzaId').val();
			if(val.length != 3)
				autoFocus("QuestionaireQ1GeoCodeMauzaId");
		});

		// $("#QuestionaireQ2UnitName").mouseup(function() {
		//   var val = $('#QuestionaireQ1UnitSerialNo').val();
		//   if(val.length != 3) autoFocus("QuestionaireQ1UnitSerialNo");
		// });

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

		$("#QuestionaireQ3UnitHeadGender1,#QuestionaireQ3UnitHeadGender2,#QuestionaireQ3UnitHeadGender3").mouseup(function() {
			if($('#QuestionaireQ2UnitName').val() == '' || $('#QuestionaireQ2VillageMaholla').val() == '')
				autoFocus("QuestionaireQ2VillageMaholla");
		});

		// ADDED NEW===========================================
		$("#QuestionaireQ3UnitHeadAge").mouseup(function() {
			var val = $('#QuestionaireQ3UnitHeadEducationId').val();
			if(val.length != 2)
				autoFocus("QuestionaireQ3UnitHeadEducationId");
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

		$("#QuestionaireQ6EconomyId").mouseup(function() {
			if($('#QuestionaireQ5UnitHeadEconomyId').val() == '')
				autoFocus("QuestionaireQ5UnitHeadEconomyId");
		});

		$("#QuestionaireQ9LegalEntityTypeId").mouseup(function() {
			if($('#QuestionaireQ6EconomyId').val() == '')
				autoFocus("QuestionaireQ6EconomyId");
		});

		$("#QuestionaireQ10IsNbrInvestment").mouseup(function() {
			if($('#QuestionaireQ9LegalEntityTypeId').val() == '')
				autoFocus("QuestionaireQ9LegalEntityTypeId");
		});

		$("#QuestionaireQ11IsRegistered").mouseup(function() {
			if($('#QuestionaireQ10IsNbrInvestment').val() == '')
				autoFocus("QuestionaireQ10IsNbrInvestment");
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

		$("#QuestionaireQ26IsVatRegistered").mouseup(function() {
			if($('#QuestionaireQ25IsTinRegistered').val() == '')
				autoFocus("QuestionaireQ25IsTinRegistered");
		});

		$("#QuestionaireQ27YearVatRegistered").mouseup(function() {
			if($('#QuestionaireQ26IsVatRegistered').val() == '')
				autoFocus("QuestionaireQ26IsVatRegistered");
		});

		//END OF REQUIRED FIELD VALIDATION FOR MOUSE

		/**
		 ************************************************************************************************
		 RANGE VALIDATION FOR INPUT FIELD
		 *************************************************************************************************
		 */
		//Range Checking for Section 3

		$("#QuestionaireQ3UnitHeadAge").blur(function() {
			var val2 = $('#QuestionaireQ3UnitHeadEducationId').val();
			var val3 = parseInt(val2, 10);
			var val4 = val3 + 6;
			var val5 = parseInt(val4, 10);

			if($("#QuestionaireQ3UnitHeadEducationId").val() == "") {
				return false;
			}

			if($(this).val() == "") {
				alert("This field is required");

			} else if($(this).val() < val5) {

				$(this).val('');
				$('#QuestionaireQ3UnitHeadEducationId').focus();
				//alert( "Age is bellow 18" );
			}

		});

		//Range Checking for Section 12

		$("#QuestionaireQ12YearOfStart").blur(function() {
			if($(this).val() < 1900 || $(this).val() > 2013) {
				alert("Are you sure?");
			}

		});

		$("#QuestionaireQ27YearVatRegistered").keyup(function() {
			var startYear = $('#QuestionaireQ12YearOfStart').val();
			var val = $(this).val();

			if(val.length >= 4 && $(this).val() >= 2013 && $(this).val() <= startYear) {
				$(this).val("");
				alert("Invalid Year of Registration");
				//$('#QuestionaireQ27YearVatRegistered').focus();
			}

		});

		/**************************************************************************************************
		 INPUT ENABLE & DISABLE
		 **************************************************************************************************/

		//Default Input Field Disable

		$("#QuestionaireQ4UnitOrgType").attr("disabled", "disabled");
		$("#QuestionaireQ10NbrAmountInThou").attr("disabled", "disabled");
		$("#QuestionaireQ11RegistrarId").attr("disabled", "disabled");
		$("#QuestionaireQ14AccountableDuration").attr("disabled", "disabled");
		$("#QuestionaireQ22IsFireDeviceMaintained").attr("disabled", "disabled");
		$("#QuestionaireQ24IsLadiesToiletAvailable").attr("disabled", "disabled");
		$("#QuestionaireQ27YearVatRegistered").attr("disabled", "disabled");

		//Default Input Field Disable for Section 6

		q7disable();
		q8disable();
		q24disable();

		// SECTION : 4 ************************************************************************************
		$("#QuestionaireQ4UnitType").keyup(function() {
			if($(this).val() == '1' || $(this).val() == "") {
				$("#QuestionaireQ4UnitOrgType").attr("disabled", "disabled");
				$("#QuestionaireQ9LegalEntityTypeId").attr("disabled", "disabled");
			} else {
				$("#QuestionaireQ4UnitOrgType").removeAttr("disabled");
				$("#QuestionaireQ9LegalEntityTypeId").removeAttr("disabled");
			}

		});

		$("#QuestionaireQ4UnitType").change(function() {
			if($(this).val() == '1' || $(this).val() == "") {
				$("#QuestionaireQ4UnitOrgType").attr("disabled", "disabled");
				$("#QuestionaireQ9LegalEntityTypeId").attr("disabled", "disabled");
			} else {

				$("#QuestionaireQ4UnitOrgType").removeAttr("disabled");
				$("#QuestionaireQ9LegalEntityTypeId").removeAttr("disabled");
			}

		});

		// SECTION : 6 *************************************************************************************
		$('#QuestionaireQ6EconomyId').keyup(function() {

			var value = $(this).val();
			if(value.length == 2 && value != $('#QuestionaireQ5UnitHeadEconomyId').val()) {
				$(this).val("");
				return false;
			} else if(value.length > 2) {
				var old = $('#QuestionaireQ5UnitHeadEconomyId').val();

				if(value[0] != old[0] || value[1] != old[1]) {
					$(this).val("");
					return false;
				}
			}

			if(($(this).val() >= 111) && ($(this).val() <= 3530)) {
				q7enable();
				q24enable();
				q8disable();
				if(value.length == 4) {
					autoFocus("QuestionaireQ7ProductId1");
				}
				autoFocusQ = 18;
			} else if($(this).val() > 3530) {
				q7disable();
				q24disable();
				q8enable();
				if(value.length == 4) {
					autoFocus("QuestionaireQ8ServiceId1");
				}
				autoFocusQ = 25;
			} else {
				q7disable();
				q8disable();
				q24disable();
				autoFocusQ = 25;
			}

		});

		//SECTION :10 ***********************************************************************************

		$('#QuestionaireQ10IsNbrInvestment').keyup(function() {

			if($(this).val() == '1')
				$("#QuestionaireQ10NbrAmountInThou").removeAttr("disabled");
			else
				$("#QuestionaireQ10NbrAmountInThou").attr("disabled", "disabled");
		});

		$('#QuestionaireQ10IsNbrInvestment').change(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ10NbrAmountInThou").removeAttr("disabled");
			else
				$("#QuestionaireQ10NbrAmountInThou").attr("disabled", "disabled");
		});

		// SECTION : 11 *********************************************************************************

		$('#QuestionaireQ11IsRegistered').keyup(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ11RegistrarId").removeAttr("disabled");
			else
				$("#QuestionaireQ11RegistrarId").attr("disabled", "disabled");
		});

		$('#QuestionaireQ11IsRegistered').change(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ11RegistrarId").removeAttr("disabled");
			else
				$("#QuestionaireQ11RegistrarId").attr("disabled", "disabled");
		});

		//SECTION : 14 ************************************************************************************

		// $('#QuestionaireQ14IsAccountable').keyup(function(){
		//      if ($(this).val() == '1')
		//      {
		//       $("#QuestionaireQ14AccountableDuration").removeAttr("disabled");
		//      }

		//      else
		//          $("#QuestionaireQ14AccountableDuration").attr("disabled", "disabled");
		//  });

		$('#QuestionaireQ14IsAccountable').change(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ14AccountableDuration").removeAttr("disabled");
			else
				$("#QuestionaireQ14AccountableDuration").attr("disabled", "disabled");
		});

		//SECTION :25 ******************************************************************************

		$('#QuestionaireQ22IsFireSecured').keyup(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ22IsFireDeviceMaintained").removeAttr("disabled");
			else
				$("#QuestionaireQ22IsFireDeviceMaintained").attr("disabled", "disabled");
		});

		$('#QuestionaireQ22IsFireSecured').change(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ22IsFireDeviceMaintained").removeAttr("disabled");
			else
				$("#QuestionaireQ22IsFireDeviceMaintained").attr("disabled", "disabled");
		});

		//SECTION : 24 **********************************************************************************

		$('#QuestionaireQ24IsToiletAvailable').keyup(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ24IsLadiesToiletAvailable").removeAttr("disabled");
			else
				$("#QuestionaireQ24IsLadiesToiletAvailable").attr("disabled", "disabled");
		});

		$('#QuestionaireQ24IsToiletAvailable').change(function() {
			if($(this).val() == '1')
				$("#QuestionaireQ24IsLadiesToiletAvailable").removeAttr("disabled");
			else
				$("#QuestionaireQ24IsLadiesToiletAvailable").attr("disabled", "disabled");
		});

		//Input field Enable/Diasable for Section 26

		$('#QuestionaireQ26IsVatRegistered').keyup(function() {
			if($(this).val() == '1' || $(this).val() == "")
				$("#QuestionaireQ27YearVatRegistered").removeAttr("disabled");
			else
				$("#QuestionaireQ27YearVatRegistered").attr("disabled", "disabled");
		});

		$('#QuestionaireQ26IsVatRegistered').change(function() {
			if($(this).val() == '1' || $(this).val() == "")
				$("#QuestionaireQ27YearVatRegistered").removeAttr("disabled");
			else
				$("#QuestionaireQ27YearVatRegistered").attr("disabled", "disabled");
		});

		/**
		 ************************************************************************************************
		 AJAX REQUESTTS  SECTION
		 *************************************************************************************************
		 */

		/*GET MUZA NAME*/

		$('#QuestionaireQ1GeoCodeMauzaId').change(function() {

			var selectvalue = $('#QuestionaireQ1GeoCodeMauzaId').val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getMuzaName";

			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					mauza_code : selectvalue,
					book_id : $('#QuestionaireBookId').val()
				},
				success : function(data) {
					var chk = "NO";
					$.each(data, function(index, element) {
						chk = "YES";
						$('#QuestionaireQ1GeoCodeMauzaName').val(element);
					});
					if(chk == "NO") {
						autoFocus("QuestionaireQ1GeoCodeMauzaId");
						$('#QuestionaireQ1GeoCodeMauzaId').val("");
						$('#QuestionaireQ1GeoCodeMauzaName').val("");
					}
				}
			});
		});

		//GET Education Description============================================================

		$('#QuestionaireQ3UnitHeadEducationId').change(function() {
			$('#q3unitheadheducation').html("Please wait...");
			var selectvalue = $('#QuestionaireQ3UnitHeadEducationId').val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getEductionDesc";

			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					education_code : selectvalue,

				},
				success : function(data) {

					var checkData = 0;

					$.each(data, function(index, element) {
						$('#q3unitheadheducation').html("<b>" + element + "</b>");
						checkData = 1;
					});

					if(checkData == 0) {
						$('#q3unitheadheducation').html("<div id='invalidCode'>Invalid Code!</div>");
						$('#QuestionaireQ3UnitHeadEducationId').val("");
						autoFocus("QuestionaireQ3UnitHeadEducationId");
					}

				}
			});

		});

		//Get Economy Desc====================================================================

		/*
		 $('#QuestionaireQ5UnitHeadEconomyId').change(function()
		 {
		 $('#QuestionaireEconomyDescBng').val("");
		 var selectvalue = $('#QuestionaireQ5UnitHeadEconomyId').val();
		 var pathname = window.location.pathname;
		 var path = pathname.split('/add');
		 path = path[0] + "/getEconomyDesc";
		 $.ajax({
		 url : path,
		 type : "POST",
		 dataType : 'json',
		 data : {
		 economy_code : selectvalue,
		 //book_id: $('#QuestionaireBookId').val()
		 },
		 success : function(data) {
		 if (data == "")
		 {
		 $('#QuestionaireQ5UnitHeadEconomyId').val("");
		 alert("Valid Code range is 01 - 21");
		 }
		 $.each(data, function(index, element) {
		 $('#QuestionaireEconomyDescBng').val(element);
		 });
		 }
		 });
		 });
		 */

		$('#QuestionaireQ5UnitHeadEconomyId').change(function() {
			$('#QuestionaireEconomyDescBng').val("");

			var selectvalue = $('#QuestionaireQ5UnitHeadEconomyId').val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getEconomyDesc";

			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					economy_code : selectvalue,
					//book_id: $('#QuestionaireBookId').val()
				},
				success : function(data) {
					if(data == "") {
						$('#QuestionaireQ5UnitHeadEconomyId').val("");
						autoFocus("QuestionaireQ5UnitHeadEconomyId");
						//alert("Valid Code range is 01 - 21");

					}
					$.each(data, function(index, element) {
						$('#QuestionaireEconomyDescBng').val(element);
					});
				}
			});
		});

		//Get Economy DEtails in Section :6====================================================================

		$('#QuestionaireQ6EconomyId').change(function() {
			$('#QuestionaireQ6EconomyDescription').val("");

			var selectvalue = $('#QuestionaireQ6EconomyId').val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getEconomyDetails";

			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					class_code : selectvalue,
					//book_id: $('#QuestionaireBookId').val()
				},
				success : function(data) {
					if(data == "") {
						$('#QuestionaireQ6EconomyId').val("");
						alert("Invalid Code");

					}
					$.each(data, function(index, element) {
						$('#QuestionaireQ6EconomyDescription').val(element);
					});
				}
			});
		});

	});
</script>

<!--*************************************************************************************************
PHP SCRIPTS START HERE
*************************************************************************************************-->

<?php
if (isset($_SESSION["q1_geo_code_mauza_id"]))
	$muza_id = $_SESSION["q1_geo_code_mauza_id"];
else
	$muza_id = "";

if (isset($_SESSION["q1_geo_code_mauza_name"]))
	$muza_name = $_SESSION["q1_geo_code_mauza_name"];
else
	$muza_name = "";
?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('New Book'), array('controller' => 'Books', 'action' => 'add')); ?>
</div>

</br>

<div class="questionaires form">
	<?php echo $this -> Form -> create('Questionaire'); ?>
	<fieldset>
		<legend>
			<?php echo __('বাংলাদেশ পরিসংখ্যান ব্যুরো'); ?>
		</legend>

		<!-- 	FORM HEADING	 -->
		<div id="form_header">
			<label><span><b>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</b></span> </label>
			<br />
			<label><span><b>অর্থনৈতিক শুমারি ২০১৩</b></span> </label>
			<hr>
			<label><span>সকল ইউনিটের জন্য পূরণ করুন</span> </label>
		</div>

		<label><span style="margin:0px 0px 15px 10px;
			font-weight:bold;">Book Code: <?=$_SESSION["bookID"]
				?></span> </label>
		<br/>
		<?php echo $this -> Form -> input('book_id', array('label' => FALSE, 'type' => 'hidden', 'value' => $_SESSION["bookID"])); ?>
		<br />
		<?php $option_yes_no = array('' => '', '1' => '1-হ্যাঁ', '2' => '2-না');
		$option_yes_no_notvalid = array('' => '', '1' => '1-হ্যাঁ', '2' => '2-না', '3' => '3-প্রযোজ্য নয়');
		$option_q18_machine_uses = array('' => '', '1' => '1 - বিদ্যুৎ চালিত', '2' => '2 - ফুয়েল চালিত', '3' => '3 - উভয়ই', '4' => '4 - হস্তচালিত', '5' => '5 - প্রযোজ্য নয়', );

		$option_q19_marketing = array('' => '', '1' => '1 - সম্পূর্ণ স্থানীয়', '2' => '2 - সম্পূর্ণ রপ্তানি', '3' => '3 - স্থানীয় ও রপ্তানি', '4' => '4 - প্রযোজ্য নয়', );

		$option_q20_fuel_uses = array('' => '', '1' => '1 - বিদ্যুৎ', '2' => '2 - সৌর বিদ্যুৎ', '3' => '3 - গ্যাস', '4' => '4 - পেট্রোলিয়াম', '5' => '5 - কয়লা', '6' => '6 - কাঠ', '7' => '7 - অন্যান্য', '8' => '8 - প্রযোজ্য নয়');
		?>

		<!--
		***********************************************************************************************
		TABLE ONE START :1
		************************************************************************************************

		-->

		<table id="table_1" border="1px" width="900px">
			<tr>
				<td width="250px">
				<div id="div_1">
					<h3>১.মৌজা / মহল্লার নাম ও কোড</h3>
					<label>নামঃ</label>
					<?=$this->Form->input('q1_geo_code_mauza_name', array(
'label' => false,
'required'=>'required',
'readonly' =>'readonly'))
					?>
					<label><span id="redmark">*</span> কোডঃ</label>
					<?=$this->Form->input('q1_geo_code_mauza_id', array(
'label' => false,
'type' => 'text',
//'value' => $muza_id,
'autofocus' => 'autofocus',
'required'=>'required',
'maxlength'=>3,
'minlength' =>3,
))
					?>
					<h3><span id="redmark">*</span> ১.১ ইউনিটের ক্রমিক নং</h3>
					<?=$this->Form->input('q1_unit_serial_no', array(
'label' => FALSE,
'required'=>'required',
'type'=>'text',
'maxlength'=>3,
'minlength' =>3,))
					?>
				</div></td>

				<td width="350px">
				<div id="div_2">
					<h3>২.ইউনিটের নাম ও ঠিকানা (ইংরেজিতে লিখুন)</h3>
					<table width="350px" input[type=text]{text-transform: uppercase;}>
						<tr>
							<td style="text-align: right;"><span id="redmark">*</span> নামঃ</td>
							<td><?=$this->Form->input('q2_unit_name', array(
'label' => FALSE,
'required'=>'required',
'style' => 'text-transform: uppercase'))
							?></td>
						</tr>
						<!--  -->
						<tr>
							<td style="text-align: right;"><span id="redmark">*</span> গ্রাম/মহল্লা:</td>
							<td><?=$this->Form->input('q2_village_maholla', array(
'label' => false,
'type' => 'text',
'required'=>'required',
'style' => 'text-transform: uppercase'))
							?></td>
						</tr>
						<!--  -->
						<tr>
							<td style="text-align: right;">বাড়ি/ মার্কেট এর নাম:</td>
							<td><?=$this->Form->input('q2_home_market', array(
'label' => false,
'style' => 'text-transform: uppercase'))
							?></td>
						</tr>
						<!--  -->
						<tr>
							<td style="text-align: right;">রোড নং/নাম:</td>
							<td><?=$this->Form->input('q2_road_no_name ', array(
'label' => false ,
'style' => 'text-transform: uppercase'))
							?></td>
						</tr>
						<!--  -->
						<tr>
							<td style="text-align: right;">হোল্ডিং নং :</td>
							<td><?=$this->Form->input('q2_holding_no', array(
'label' => false,
'style' => 'text-transform: uppercase'))
							?></td>
							</tr
						<tr>
							<td style="text-align: right;">টেলিফোন / মোবাইল নং:</td>
							<td><?=$this->Form->input('q2_telephone_no', array(
'label' => false,
'style' => 'text-transform: uppercase'))
							?></td>
							</tr
						<tr>
							<td style="text-align: right;">ফ্যাক্স নং:</td>
							<td><?=$this->Form->input('q2_fax_no', array(
'label' => false,
'style' => 'text-transform: uppercase'))
							?></td>
							</tr
						<tr>
							<td style="text-align: right;">ইমেইল নং:</td>
							<td><?=$this->Form->input('q2_email_address', array(
'label' => false,
'style' => 'text-transform: uppercase'))
							?></td>
						</tr>

					</table>
					<!--End of sub table-->

				</div></td>

				<td width="260px">
				<div id="div_3">

					<h3>৩. ইউনিট প্রধান</h3>

					<label><span id="redmark">*</span>৩.১  লিঙ্গ :</label>
					<br>

					<table id = "gender_tbl">

						<tr>
							<td id="genderdsc">
							<input id="QuestionaireQ3UnitHeadGender1"  type="text" minlength="1" maxlength="1" name="data[Questionaire][q3_unit_head_gender1]">
							</td><td id="genderdsc2"><label> পুরুষ....1 <lebel></td><td></td>

						</tr>

						<tr>
							<td id="genderdsc">
							<input id="QuestionaireQ3UnitHeadGender2"  type="text" minlength="1" maxlength="1" name="data[Questionaire][q3_unit_head_gender2]">
							</td><td id="genderdsc2"><label> মহিলা....2 <lebel></td><td></td>
						</tr>

						<tr>
							<td id="genderdsc">
							<input id="QuestionaireQ3UnitHeadGender3"  type="text" minlength="1" maxlength="1" name="data[Questionaire][q3_unit_head_gender3]">
							</td><td id="genderdsc2"><label> অন্যান্য...3 <lebel></td><td></td>
						</tr>

					</table>

					<label><span id="redmark">*</span>৩.২  শিক্ষা:(শিক্ষা কোড লিখুন)</label>
					<?=$this->Form->input('q3_unit_head_education_id', array(
'label' => false,
'required'=>'required',
'maxlength'=>2,
'minlength' =>2,
'type'=>'text'))
					?>
					<div id="q3unitheadheducation"></div>

					<label><span id="redmark">*</span>৩.৩  বয়স  :(পূর্ণ বছরে লিখুন)</label>
					<?=$this->Form->input('q3_unit_head_age', array(
'label' => false,
'required'=>'required',
'type'=>'text',
'maxlength' => 2,
'minlength' => 2))
					?>
				</td>

				<td width="200px">
				<div id="div_4">
					<h3>৪.ইউনিটের প্রকার</h3>
					<label>ইউনিটের প্রকার</label>
					<?php echo $this -> Form -> input('q4_unit_type', array('div' => true, 'label' => false, 'options' => array('' => '', '1' => '1-খানা', '2' => '2-প্রতিষ্ঠান'))); ?>
					<br/>
					<!-- 	<h3>প্রতিষ্ঠান হলে</h3> -->
					<div id = "div_4_1" >
						<label>প্রতিষ্ঠান হলে</label>
						<?php echo $this -> Form -> input('q4_unit_org_type', array('div' => true, 'label' => false, 'options' => array('' => '', '1' => '1-স্থায়ী', '2' => '2-অস্থায়ী'))); ?>
					</div>
				</div></td>

				<td>
				<div id="div_5">

					<h3>৫.ইউনিট এর প্রধান অর্থনৈতিক
					<br/>
					কর্মকাণ্ডের প্রকার</h3>
					<label>(কোড লিখুন )</label>
					<?=$this->Form->input('q5_unit_head_economy_id', array(
'label' =>false,
'maxlength'=>"2",
'minlength' =>"2",
'type'=>'text'
))
					?>

					<?=$this->Form->input('economy_desc_bng', array(
'label' =>false,
'type'=>'textarea',
'disabled'=> 'disabled'))
					?>
				</div></td>

				<td>
				<div id="div_6">

					<h3><span id="redmark">*</span> ৬.ইউনিট এর অর্থনৈতিক কর্মকাণ্ডের
					<br/>
					বিস্তারিত বিবরন ও শিল্প কোড লিখুন </h3>

					<label>শিল্প কোড লিখুনঃ</label>
					<?=$this->Form->input('q6_economy_id', array(
'label' =>false,
'required'=>'required',
'maxlength'=>4,
'minlength'=>4,
'type'=>'text'))
					?>

					<?=$this->Form->input('q6_economy_description', array(
'label' =>false,
'type'=>'textarea',
'disabled'=> 'disabled'))
					?>
				</div></td>

			</tr>

		</table>

		<!-- 	SEPARETOR	 -->
		<div class="separetor">
			<br />
		</div>

		<!--
		***********************************************************************************************
		TABLE TWO START  :2
		************************************************************************************************

		-->

		<table id="table_2" border="1">

			<tr>

				<td>
				<div id = "div_7">
					<h3>৭. উৎপাদন কারী ইউনিটের প্রধান প্রধান উৎপাদিত দ্রব্যাদির বিবরণ </h3>

					<table id = "sub_tbl_1">

						<tr>
							<!-- <td align="center">বিবরণ </td> -->
							<td align="center">কোড</td>
						</tr>

						<tr>
							<td><?=$this -> Form -> input('q7_product_id_1', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength'=>5))
							?></td>
						</tr>

						<tr>
							<td><?=$this -> Form -> input('q7_product_id_2', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

						<tr>
							<td></tdtr><?=$this -> Form -> input('q7_product_id_3', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

						<tr>
							<td><?=$this -> Form -> input('q7_product_id_4', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

					</table>

				</div></td>

				<td>
				<div id = "div_8">
					<h3>৮. মেরামত/বিক্রয়/সেবা প্রদানকারী ইউনিটের কাজের বিবরণ</h3>
					<table id = "sub_tbl_2">

						<tr>

							<td align="center">কোড</td>
						</tr>

						<tr>

							<td><?=$this -> Form -> input('q8_service_id_1', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

						<tr>

							<td><?=$this -> Form -> input('q8_service_id_2', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

						<tr>

							<td></tdtr><?=$this -> Form -> input('q8_service_id_3', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

						<tr>
							<td><?=$this -> Form -> input('q8_service_id_4', array(
'label' => false,
'type'=>'text',
'maxlength'=>5,
'minlength' =>5))
							?></td>
						</tr>

					</table>

				</div></td>

				<!--  SECTION NINE-->
				<td>
				<div id = "div_9">
					<h3>৯. ইউনিটের (প্রতিষ্ঠান) আইনগত মালিকানা</h3>

					<br />
					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q9_legal_entity_type_id', array(
'label' => false,
'type'=>'text',
'maxlength'=>2,
'minlength' =>2 ))
					?>

					<div id="q9details"></div>

				</div></td>

				<td>
				<div id = "div_10">
					<h3><span id="redmark">*</span>১০. ইউনিটে প্রবাসী বাংলাদেশিদের বিনিয়োগ আছে কি ? </h3>
					<table id = 'tbl_10_1' border = '1'>

						<tr>

							<?php echo $this -> Form -> input('q10_is_nbr_investment', array('label' => false, 'required' => 'required', 'options' => $option_yes_no)); ?>
						</tr>

						<tr>
							<div id = "div_10_1">
								<h3>১০.১  হ্যাঁ হলে</h3>
								<label>বিনিয়োগের পরিমান(হাজার টাকায়)</label>
								<?=$this -> Form -> input('q10_nbr_amount_in_thou', array(
'label' => false,
'type'=>'text',
'required'=>'required'))
								?>
							</div>
						</tr>
					</table>
				</td>

				<!--    Start table 11  -->
				<td>
				<table id = 'tbl_11_1' border= '1'>

					<tr>
						<td><h3><span id="redmark">*</span> ১১.ইউনিটটি নিবন্ধিত কি ? </h3><?php echo $this -> Form -> input('q11_is_registered', array('label' => false, 'required' => 'required', 'options' => $option_yes_no_notvalid)); ?></td>
					</tr>
					<tr>

						<!--   SECTION  BE EDITED -->

						<td>
						<div id = "div_11_1">
							<h3><span id="redmark">*</span> ১১.১. হ্যাঁ হলে কোথায় নিবন্ধিত? </h3>
							<label>(কোড লিখুন)</label>
							<?=$this -> Form -> input('q11_registrar_id', array(
'label' => false,
'required'=>'required',
'type'=>'text',
'maxlength'=>2,
'minlength' =>2 ))
							?>
							<div id="q11_1details"></div>

						</div></td>

					</tr>
				</table></td>

			</tr>
		</table>

		<!--    SEPARETOR    -->
		<div class="separetor">
			<br />
		</div>

		<!--
		***********************************************************************************************
		TABLE TWO THREE  :3
		************************************************************************************************

		-->

		<!--  TABLE THREE START-->
		<table id="table_3" border="1">

			<tr>

				<td width="200px">
				<div id = "div_12">
					<h3>১২. কোন সালে আরম্ভ হয়েছে?</h3>
					<br>
					<br>
					<?=$this->Form->input('q12_year_of_start', array(
'label' => '(ইংরেজি সাল লিখুন) ',
'type'=>'text',
'maxlength'=>4,
'minlength' =>4))
					?>
				</div></td>

				<td>
				<div id = "div_13">
					<h3><span id="redmark">*</span> ১৩. ইউনিটের বিক্রয় পদ্ধতি</h3>
					<br />

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q13_sale_procedure', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>1,
'minlength' =>1 ))
					?>

					<div id="q13details"></div>

				</div></td>

				<td>
				<div id = "div_14">
					<h3><span id="redmark">*</span> ১৪. হিসাব রাখার ব্যবস্থা আছে কি ?</h3>
					<br />

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q14_is_accountable', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>1,
'minlength' =>1 ))
					?>

					<div id="q14details"></div>

				</div></td>

				<td>
				<div id = "div_14_1">
					<h3><span id="redmark">*</span> ১৪.১. হ্যাঁ হলে</h3>
					<br>
					<br>

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q14_accountable_duration', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>1,
'minlength' =>1 ))
					?>

					<div id="q14_1details"></div>

				</div></td>

				<td>
				<div id = "div_15">
					<h3>১৫. ইউনিটের বেতন/মজুরি</h3>

					<h3><span id="redmark">*</span> ১৫.১ প্রদান পদ্ধতি </h3>

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q15_salary_instr', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>1,
'minlength' =>1 ))
					?>

					<div id="q15_1details"></div>

					<h3><span id="redmark">*</span> ১৫.২  প্রদানের ধরন</h3>

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q15_salary_period', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>1,
'minlength' =>1 ))
					?>

					<div id="q15_2details"></div>

				</div></td>

				<td>
				<div id = "div_16">
					<h3><span id="redmark">*</span> ১৬. বর্তমান স্থায়ী মূলধন</h3>
					<br />

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q16_fixed_capital', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>2,
'minlength' =>2 ))
					?>

					<div id="q16details"></div>
				</div></td>

				<td>
				<div id = "div_17">
					<h3 style= "text-align: center">১৭. অর্থনৈতিক কর্মকান্ডে নিয়োজিত জনবলের প্রকার ও সংখ্যা</h3>

					<table id = 'tbl_17'>
						<tr>

							<td style="border: 1px solid black;" ><h3>১৭.১ মালিক/ অংশীদার কর্মরত </h3> পুরুষ
							<br />
							<?=$this->Form->input('q17_hr_male', array(
'label' => FALSE,
'type'=>'text',
'maxlength'=>2,
'minlength' =>2))
							?>
							মহিলা
							<br />
							<?=$this->Form->input('q17_hr_female', array(
'label' =>false,
'type'=>'text',
'maxlength'=>2,
'minlength' =>2))
							?></td>

							<td style="border: 1px solid black;"><h3>১৭.২ অবৈতনিক পারিবারিক কর্মী </h3> পুরুষ
							<br />
							<?=$this->Form->input('q17_hr_male_foc', array('label' => false,'type'=>'text', 'maxlength'=>2,'minlength' =>2))
							?>

							মহিলা
							<br />
							<?=$this->Form->input('q17_hr_female_foc', array('label' => FALSE,'type'=>'text', 'maxlength'=>2,'minlength' =>2))
							?></td>

							<td style="border: 1px solid black;"><h3>১৭.৩ সার্বক্ষনিক কর্মী</h3>
							<br>
							পুরুষ
							<br />
							<?=$this->Form->input('q17_hr_male_fulltime', array('label' => FALSE,'type'=>'text', 'maxlength'=>4,'minlength' =>4))
							?>
							মহিলা
							<br />
							<?=$this->Form->input('q17_hr_female_fulltime', array('label' => FALSE,'type'=>'text', 'maxlength'=>4,'minlength' =>4))
							?></td>

							<td style="border: 1px solid black;"><h3>১৭.৪ খন্ডকালীন কর্মী </h3>
							<br>
							পুরুষ
							<br />
							<?=$this->Form->input('q17_hr_male_parttime', array('label' => FALSE,'type'=>'text', 'maxlength'=>3,'minlength' =>3))
							?>
							মহিলা
							<br />
							<?=$this->Form->input('q17_hr_female_parttime', array('label' => FALSE,'type'=>'text', 'maxlength'=>3,'minlength' =>3))
							?></td>

							<td style="border: 1px solid black;"><h3>১৭.৫  অনিয়মিত কর্মী (সাপ্তাহিক গড়)</h3> পুরুষ
							<br />
							<?=$this->Form->input('q17_hr_male_irregular', array('label' => FALSE,'type'=>'text', 'maxlength'=>2,'minlength' =>2))
							?>
							মহিলা
							<br />
							<?=$this->Form->input('q17_hr_female_irregular', array('label' => FALSE,'type'=>'text', 'maxlength'=>2,'minlength' =>2))
							?></td>

						</tr>

					</table>

				</div></td>

			</tr>
		</table>

		<!--    SEPARETOR    -->
		<div class="separetor">
			<br />
		</div>

		<!--
		***********************************************************************************************
		TABLE FOUR START  :  4
		************************************************************************************************

		-->

		<table id = "table_4" border="1">
			<tr>
				<td colspan="9"><b> শুধুমাত্র উৎপাদন সংক্রান্ত কর্মকান্ডে নিয়োজিত ইউনিটের জন্য পূরণ করুন</b></td>
				<td colspan="3"><b> সকল ইউনিটের জন্য পূরণ করুন</b></td>
			</tr>
			<tr>
				<td>
				<div id="div_18">
					<h3>১৮।  . উৎপাদন যন্ত্রের ব্যবহার</h3>
					<br>
					<?=$this->Form->input('q18_machine_uses', array('options' => $option_q18_machine_uses, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_19">
					<h3>১৯. উৎপাদিত দ্রব্যের বাজারজাতকরণ</h3>
					<br>
					<?=$this->Form->input('q19_marketing', array('options' => $option_q19_marketing, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_20">
					<h3>২০. উৎপাদনে জ্বালানির ব্যবহার</h3>
					<br>
					<?=$this->Form->input('q20_fuel_uses', array('options' => $option_q20_fuel_uses, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_21">
					<h3>২১. উৎপাদনে কম্পিউটার প্রযুক্তি ব্যবহার হয় কি?</h3>
					<br>
					<?=$this->Form->input('q21_is_it_enabled', array('options' => $option_yes_no, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_22">
					<h3>২২. অগ্নিনির্বাপণ ব্যবস্থা আছে কি?</h3>
					<br>
					<?=$this->Form->input('q22_is_fire_secured', array('options' => $option_yes_no, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_22_1">
					<h3>২২.১ থাকলে তা নিয়মিত রক্ষণাবেক্ষণ করা হয় কি?</h3>
					<br>
					<?=$this->Form->input('q22_is_fire_device_maintained', array('options' => $option_yes_no, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_23">
					<h3>২৩. নিরাপদ ও স্বাস্থ্যসম্মতভাবে বর্জ্য অপসারণ ব্যবস্থা আছে কি?</h3>
					<?=$this->Form->input('q23_is_garbage_proper', array('options' => $option_yes_no, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_24">
					<h3>২৪. শৌচাগারের ব্যবস্থা আছে কি?</h3>
					<br>
					<?=$this->Form->input('q24_is_toilet_available', array('options' => $option_yes_no, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_24_1">
					<h3>২৪.১ হ্যাঁ হলে মহিলাদের জন্য পৃথক ব্যবস্থা আছে কি?</h3>
					<br>
					<?=$this->Form->input('q24_is_ladies_toilet_available', array('options' => $option_yes_no, 'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_25">
					<h3><span id="redmark">*</span> ২৫. টিআইএন আছে কি?</h3>

					<label>(কোড লিখুন)</label>
					<?=$this -> Form -> input('q25_is_tin_registered', array(
'label' => false,
'required'=>'required',
'type' => 'text',
'maxlength'=>1,
'minlength' =>1 ))
					?>

					<div id="q25details"></div>
				</div></td>

				<td>
				<div id="div_26">
					<h3><span id="redmark">*</span> ২৬. প্রতিষ্ঠানটি মূল্য সংযোজন কর (মূসক/ভ্যাট) নিবন্ধিত কি?</h3>
					<?=$this->Form->input('q26_is_vat_registered', array('options' => $option_yes_no,'required'=>'required',  'label' => FALSE))
					?>
				</div></td>

				<td>
				<div id="div_27">
					<h3>২৭. হ্যাঁ হলে কোন সালে ভ্যাট নিবন্ধন করা হয়েছে?</h3>
					<br>
					<?=$this->Form->input('q27_year_vat_registered', array( 'label' => FALSE,'type'=>'text', 'maxlength'=>4,'minlength' =>4))
					?>
				</div></td>

			</tr>
		</table>

	</fieldset>
	<?php echo $this -> Form -> end(__('Submit')); ?>
</div>