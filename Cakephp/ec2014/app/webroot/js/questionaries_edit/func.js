//BUILDING ALL FUNCTIONS AND ARRAY
var RMO_MAIN_CODE = "";
var IS_CACHE;
var option_q9 = new Array();
var option_q10 = new Array();
var option_q11 = new Array();
var option_q11_1 = new Array();
var option_q13 = new Array();
var option_q14 = new Array();
var option_q14_1 = new Array();
var option_q15_1 = new Array();
var option_q15_2 = new Array();
var option_q16 = new Array();
var option_q18 = new Array();
var option_q19 = new Array();
var option_q20 = new Array();
var option_yes_no = new Array();
var option_q25 = new Array();

var autoFocusQ = "";
option_q9[1] = 'পারিবারিক/ব্যক্তিগত-01';
option_q9[2] = 'অংশীদারিত্ব-02';
option_q9[3] = 'প্রাইভেট লি.-03';
option_q9[4] = 'পাবলিক লি.-04';
option_q9[5] = 'সরকারি-05';
option_q9[6] = 'স্বায়ত্তশাসিত-06';
option_q9[7] = 'বিদেশি-07';
option_q9[8] = 'যৌথ-08';
option_q9[9] = 'সমবায়-09';
option_q9[10] = 'এনপিআই-10';
option_q9[11] = 'প্রবাসী বাংলাদেশি-11';
option_q9[12] = 'অন্যান্য-12';
option_q9[99] = 'তথ্য নেই!...99';

option_q11[1] = 'জয়েন্ট স্টক কোম্পানী-01';
option_q11[2] = 'বিনিয়োগ বোর্ড-02';
option_q11[3] = 'বিসিক-03';
option_q11[4] = 'বেপজা-04';
option_q11[5] = 'কলকারখানা পরিদর্শন পরিদপ্তর-05';
option_q11[6] = 'সমবায় অফিস-06';
option_q11[7] = 'সিটি কর্পোরেশন-07';
option_q11[8] = 'পৌরসভা-08';
option_q11[9] = 'ইউনিয়ন  পরিষদ-09';
option_q11[10] = 'এনজিও ব্যুরো-10';
option_q11[11] = 'অন্যান্য-11';
option_q11[99] = 'তথ্য নেই-99';

option_q11_1[1] = 'হ্যাঁ...1';
option_q11_1[2] = 'না...2';
option_q11_1[3] = 'প্রযোজ্য নয়...3';
option_q11_1[9] = 'তথ্য নেই...9';

option_q10[1] = 'হ্যাঁ...1';
option_q10[2] = 'না...2';
option_q10[9] = 'তথ্য নেই!...9';

function return_function(key) {
	return (key != 9);
}

function alert_function() {
	alert("এই ঘরটি পূরণ করা বাধ্যতামূলক।");
}

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

//Auto Focus Function=============================================================

function autoFocus(id) {
	$("#" + id).focus();
}

// function for ajax request // This Provide village name
function get_village(path, muza_code, book_id) {
	$("#QuestionaireQ2VillageMaholla").empty();
	$.ajax({
		url : path,
		type : "POST",
		dataType : 'json',
		data : {
			mauza_code : muza_code,
			book_id : book_id
		},
		success : function(data) {
			var chk = "NO";
			$.each(data, function(index, element) {
				$("#QuestionaireQ2VillageMaholla").append($("<option />").val(element.GeoCodeVillage.village_name).text(element.GeoCodeVillage.village_name));
				chk = "YES";
			});

			if(chk == "NO") {
				$("#QuestionaireQ2VillageMaholla").empty();
			}
		}
	});
}

function get_village_edit(path, muza_code, book_id) {
	$("#QuestionaireQ2VillageMaholla").empty();
	$.ajax({
		url : path,
		type : "POST",
		dataType : 'json',
		data : {
			mauza_code : muza_code,
			book_id : book_id
		},
		success : function(data) {
			var chk = "NO";
			$.each(data, function(index, element) {
				$("#QuestionaireQ2VillageMaholla").append($("<option />").val(element.GeoCodeVillage.village_name).text(element.GeoCodeVillage.village_name));
				chk = "YES";
			});

			if(chk == "NO") {
				$("#QuestionaireQ2VillageMaholla").empty();
			}
		}
	});
}

// function for ajax request // just call the function with codeID and  desID
function getProductDesc(codeID, desID, desInput, isRight) {
	$('#' + desID).html("");
	$('#' + desInput).val("");

	var selectvalue = $('#' + codeID).val();
	var pathname = window.location.pathname;
	var path = pathname.split('/QuesChecks');
	path = path[0] + "/questionaires/getProductDesc";

	$.ajax({
		url : path,
		type : "POST",
		dataType : 'json',
		data : {
			sub_class_code : selectvalue
		},
		success : function(data) {
			if(data == "") {
				var who = confirm('ভুল কোড।  আপনি কি নিশ্চিত?');
				if(who) {
					var details = prompt('প্রশ্নপত্রে লেখা বর্ণনাটি লিখুন', '');
					if(details) {
						$('#' + desID).html(details);
						$('#' + desInput).val(details);
						$('#' + isRight).val(0);
					} else {
						autoFocus(codeID);
						$('#' + desID).html("");
						$('#' + desInput).val("");
						$('#' + codeID).val("");
					}
				} else {
					autoFocus(codeID);
					$('#' + desID).html("");
					$('#' + desInput).val("");
					$('#' + codeID).val("");
				}

				return true;
			}

			$.each(data, function(index, element) {
				$('#' + desID).html(element);
				$('#' + desInput).val(element);
				$('#' + isRight).val(1);
			});

		}
	});
}
//***************************************************
function load_start() {
	$('body').addClass("loading");
}

function load_stop() {
	$("body").removeClass("loading");
}
// Function that works for Partial submit of questionnaire

function submit_form()
{
        load_start();
        var action = $('#QuestionaireEditDetailsForm').attr('action');
                                var path1 = action.split('edit_details');
        var path2 = path1[0]; 
        var finalAction = path1[0]+"partialSubmitEdit/"+$('#QuestionaireBookId').val();
        $("#QuestionaireEditDetailsForm").attr("action", finalAction);
        $('#QuestionaireEditDetailsForm').submit();
        

}
//  END OF  BUILDING ALL FUNCTIONS AND ARRAY

