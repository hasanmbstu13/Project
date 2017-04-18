//Auto Focus=======================================================
function autoFocus(id) {
	$("#" + id).focus();
}


$(document).ready(function() {

	$('input').attr('autocomplete', 'off');
	$('input,textarea').bind("cut copy paste", function(e) {
		e.preventDefault();
	});

	$('#growth_centre').hide();

	$("#BookGeoCodeDivnId,#BookGeoCodeZilaId,#BookGeoCodeUpazilaId,#BookGeoCodeRmoId,#BookGeoCodePsaId, #BookGeoCodeUnionId").live("keydown", function(e) {
		var key = e.charCode || e.keyCode || 0;
		// allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
		return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
	});

	//Enable/Disable of PSA code depends on RMO Code========================

	$("#BookGeoCodePsaId").attr("disabled", "disabled");

	$('#BookGeoCodeRmoId').keyup(function() {

		var value = parseInt($(this).val(), 10);

		if(value == 2 || value == 9 || value == 5) {
			$("#BookGeoCodePsaId").removeAttr("disabled", "disabled");
		} else {
			$("#BookGeoCodePsaId").attr("disabled", "disabled");
		}

		if(value == 1 || value == 3 || value == 7) {
			$('#growth_centre').show();
		} else {
			$('#growth_centre').hide();
		}
	});

	$('#BookGeoCodeRmoId').mouseup(function() {

		if($(this).val() == 2 || $(this).val() == 9) {
			$("#BookGeoCodePsaId").removeAttr("disabled", "disabled");
		} else {
			$("#BookGeoCodePsaId").attr("disabled", "disabled");
		}
	});

	$('#BookGeoCodeUnionId').blur(function() {
		var value = $(this).val();

		if(value.length == 2) {
			autoFocus('BookAreaId');
		}

	});

	$('#BookAreaId').blur(function() {
		var value = $(this).val();

		if(value.length == 2) {
			autoFocus('BookBookCode2');
		}

	});

	//Null Field Checking and Length must be 2===============================

	$("#BookGeoCodeDivnId,#BookGeoCodeZilaId,#BookGeoCodeUpazilaId,#BookGeoCodeUnionId,#BookGeoCodePsaId").live("keydown", function(e) {
		/* var key = e.charCode || e.keyCode || 0;
		 if ($(this).val() == '' && key == 9) return (key != 9); */

		var key = e.charCode || e.keyCode || 00;
		var val = $(this).val();
		if((val.length != 2 || val == 0) && key == 9)
			return (key != 9);
	});

	//Null Field and checking and length must be 1==============================

	$("#BookGeoCodeRmoId").live("keydown", function(e) {

		var key = e.charCode || e.keyCode || 0;
		var val = $(this).val();
		if((val.length != 1 || val == 0) && key == 9)
			return (key != 9);
	});

	//Starts from the top of the sheet===========================================

	$("#BookGeoCodeZilaId,#BookGeoCodeUpazilaId,#BookGeoCodeRmoId,#BookGeoCodePsaId,#BookGeoCodePsaId,#BookGeoCodeUnionId").mouseup(function() {
		if($('#BookGeoCodeDivnId').val() == '')
			autoFocus("BookGeoCodeDivnId");
	});

	$("#BookGeoCodeRmoId").change(function() {
		$('#BookGeoCodeRmaName').html("Please wait...");
		var selectvalue = $('#BookGeoCodeRmoId').val();
		var pathname = window.location.pathname;
		var path = pathname.split('/add');
		path = path[0] + "/getRmoName";

		$.ajax({
			url : path,
			type : "POST",
			dataType : 'json',
			data : {

				zila_code : $('#BookGeoCodeZilaId').val(),
				upzila_code : $('#BookGeoCodeUpazilaId').val(),
				rmo_code : selectvalue

			},
			success : function(data) {
				$('#BookGeoCodeRmaName').html("<div id='invalidCode'>ভুল কোড!</div>");
				var chk = "NO";
				$.each(data, function(index, element) {
					$('#BookGeoCodeRmaName').html("<b>" + element + "</b>");
					chk = "YES";

				});

				if(chk == "NO") {
					$('#BookGeoCodeRmoId').val("");
					$("#BookGeoCodeRmoId").focus();
				}
			}
		});
	});

	$("#BookGeoCodePsaId").change(function() {

		$('#BookGeoCodePsaName').html("Please wait...");
		var selectvalue = $('#BookGeoCodePsaId').val();
		var pathname = window.location.pathname;
		var path = pathname.split('/add');
		path = path[0] + "/getPsaName";

		$.ajax({
			url : path,
			type : "POST",
			dataType : 'json',
			data : {

				psa_code : selectvalue,
				upzila_code : $('#BookGeoCodeUpazilaId').val(),
				zila_code : $('#BookGeoCodeZilaId').val(),
				rmo_code : $('#BookGeoCodeRmoId').val()

			},
			success : function(data) {
				$('#BookGeoCodePsaName').html("<div id='invalidCode'>ভুল কোড!</div>");
				var chk = "NO";
				$.each(data, function(index, element) {
					$('#BookGeoCodePsaName').html("<b>" + element + "</b>");
					chk = "YES";

				});

				if(chk == "NO") {
					$('#BookGeoCodePsaId').val("");
					$("#BookGeoCodePsaId").focus();
				}
			}
		});
	});

	$("#BookGeoCodeUnionId").change(function() {
		var selectvalue = $(this).val();

		$('#BookGeoCodeUnionName').html("Please wait...");
		var selectvalue = $('#BookGeoCodeUnionId').val();
		var pathname = window.location.pathname;
		var path = pathname.split('/add');
		path = path[0] + "/getUnionName";

		$.ajax({
			url : path,
			type : "POST",
			dataType : 'json',
			data : {

				union_code : selectvalue,
				rmo_code : $('#BookGeoCodeRmoId').val(),
				zila_code : $('#BookGeoCodeZilaId').val(),
				upzila_code : $('#BookGeoCodeUpazilaId').val()

			},
			success : function(data) {
				$('#BookGeoCodeUnionName').html("<div id='invalidCode'>ভুল কোড!</div>");
				var chk = "NO";
				$.each(data, function(index, element) {
					$('#BookGeoCodeUnionName').html("<b>" + element + "</b>");
					chk = "YES";

				});

				if(chk == "NO") {
					$('#BookGeoCodeUnionId').val("");
					$("#BookGeoCodeUnionId").focus();
				}
				bookIdGenerator();
			}
		});
	});
	
	$("#BookAreaId").change(function() {
		bookIdGenerator();
	});

	//Change Selected Area============================================

	$('input:text').focus(function() {
		$(this).css({
			'background-color' : '#F6FCB3'
		});
	});

	$('input:text').blur(function() {
		$(this).css({
			'background-color' : '#fff'
		});
	});

});

function bookIdGenerator() {
	
	var val = $('#BookGeoCodePsaId').val();
	if(val == "") {
		val = 99;
	} 

	
	var value = $('#BookGeoCodeDivnId').val() + $('#BookGeoCodeZilaId').val() + $('#BookGeoCodeUpazilaId').val() + val + $('#BookGeoCodeUnionId').val() + $('#BookAreaId').val();

	if($('#BookGeoCodeDivnId').val() == "" || $('#BookGeoCodeZilaId').val() == "" || val == "" ||$('#BookGeoCodeUpazilaId').val() == "" || $('#BookGeoCodeUnionId').val() == "" || $('#BookAreaId').val() == "") 
	{
		$('#BookBookCode').val("");
	} 
	else 
	{
		$('#BookBookCode').val(value);
	}

}

