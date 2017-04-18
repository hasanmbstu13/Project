$(document).ready(function() {

	bookIdGenerator();
	$('input').attr('autocomplete', 'off');
	$('input,textarea').bind("cut copy paste", function(e) {
		e.preventDefault();
	});

});

function bookIdGenerator() {
	var val = $('#BookGeoCodePsaId').val();
	if(val == "") {
		val = 99;
	}
	var value = $('#BookGeoCodeDivnId').val() + $('#BookGeoCodeZilaId').val() + $('#BookGeoCodeUpazilaId').val() + val + $('#BookGeoCodeUnionId').val();

	if($('#BookGeoCodeDivnId').val() == "" || $('#BookGeoCodeZilaId').val() == "" || $('#BookGeoCodeUpazilaId').val() == "" || $('#BookGeoCodeUnionId').val() == "") {
		$('#BookBookCode').val("");
	} else {
		$('#BookBookCode').val(value);
	}

}
