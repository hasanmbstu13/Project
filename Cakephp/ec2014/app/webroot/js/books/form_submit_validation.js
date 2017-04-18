$(document).ready(function() {


	$('#saveBookID').click(function() {
		var Divn = $('#BookGeoCodeDivnId').val();
		var Zila = $('#BookGeoCodeZilaId').val();
		var Upzila = $('#BookGeoCodeUpazilaId').val();
		var Union = $('#BookGeoCodeUnionId').val();
		var Rmo = $('#BookGeoCodeRmoId').val();
		var bookCode = $('#BookBookCode').val();
		var bookCode2 = $('#BookBookCode2').val();
		var area_id = $('#BookAreaId').val();
		
		
			

		if($('#BookGeoCodeDivnId').val() == "" || Divn.length != 2 || $('#BookGeoCodeDivnId').val() == 0) {

			alert("সঠিক  বিভাগ কোড এন্ট্রি করুন");
			return false;
		}

		else if ($('#BookGeoCodeZilaId').val() == "" || Zila.length != 2 || $('#BookGeoCodeZilaId').val() == 0) {
			alert("সঠিক জেলা কোড এন্ট্রি করুন");
			return false;
		}
		else if($('#BookGeoCodeUpazilaId').val() == "" || Upzila.length != 2 || $('#BookGeoCodeUpazilaId').val() == 0) {
			alert("সঠিক উপজেলা কোড এন্ট্রি করুন");
			return false;
		}

		else if($('#BookGeoCodeRmoId').val() == "" || Rmo.length != 1 || $('#BookGeoCodeRmoId').val() == 0) {
			alert("সঠিক আরএমও এন্ট্রি করুন");
			return false;
		}
		
		

		else if($('#BookGeoCodeUnionId').val() == "" || Union.length != 2 || $('#BookGeoCodeUnionId').val() == 0) {
			alert("সঠিক ইউনিয়ন কোড এন্ট্রি করুন");
			return false;
		}

		else if($('#BookBookCode').val() == "" || bookCode.length != 12 || $('#BookBookCode').val() == 0) {
			alert("বইয়ের সঠিক কোড এন্ট্রি করুন");
			return false;
		}
		
		//Edited 16 February=================
		
		else if(($('#BookGeoCodeRmoId').val() == "2" || $('#BookGeoCodeRmoId').val() == "9") &&  $('#BookGeoCodePsaId').val() == "")
		{
			alert("পৌরসভা/সিটি কর্পোরেশন কোড এন্ট্রি করুন।"); 
			return false;
		}
		
		else if(($('#BookGeoCodeRmoId').val() == "1" || $('#BookGeoCodeRmoId').val() == "3" || $('#BookGeoCodeRmoId').val() == "7") && $("#BookAddForm input[type='radio']:checked").val()  == undefined)
		{
			alert("গ্রোথ সেন্টার (GC) অন্তর্ভুক্ত কিনা সিলেক্ট করুন।"); 
			return false;
		}
		
		
		 

		else if($('#BookBookCode2').val() == "" || bookCode2.length != 2 || $('#BookBookCode2').val() == 0) {
			alert("বইয়ের সঠিক কোড এন্ট্রি করুন");
			return false;
		}
		else if(area_id == "" || area_id.length != 2) {
			alert("গননা এলাকা এর সঠিক কোড এন্ট্রি করুন");
			return false;
		}

	});
}); 