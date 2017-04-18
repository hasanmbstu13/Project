$(document).ready(function() {

	$('#saveQusID').click(function() {

		//Q 2 Validation
		
		var mauza = $('#QuestionaireQ1GeoCodeMauzaId').val();
        
        if(mauza.length != 3)
        {
        	alert("ভুল মৌজা  কোড");
        	return false;
        }
        
        if($('#QuestionaireQ1GeoCodeMauzaName').val() == "")
        {
        	alert("ভুল মৌজা নাম"); 
			return false;
        }
        
        var unit = $('#QuestionaireQ1UnitSerialNo').val();
        
        if(unit.length != 3)
        {
        	alert("ভুল ইউনিট সিরিয়াল নং");
        	return false;
        }
        
        if($('#QuestionaireQ4UnitType').val() == "2" && $('#QuestionaireQ4UnitOrgType').val() == "")
        {
        	alert("ইউনিটের প্রকার (স্থায়ী/অস্থায়ী) সিলেক্ট করুন");
        	return false;
        }
        

		if(!validateEmail($("#QuestionaireQ2EmailAddress").val()) && $("#QuestionaireQ2EmailAddress").val() != "") {
            alert("সঠিক ইমেইল এন্ট্রি করুন");
            return false;
        }
        
        var q6 = $("#QuestionaireQ6EconomyId").val();
		if(q6.length != 4)
		{
			alert('ইউনিটের অর্থনৈতিক কর্মকাণ্ডের শিল্প কোড লিখুন '); 
			return false;
		}

		//Q2 Empty Village Validation
		
		if($('#QuestionaireQ2VillageMaholla').val() == ""){
			
			alert('গ্রাম/মহল্লা এন্ট্রি করুন।'); 
			return false;
		}


		//Q 7 Validation

		if($('#QuestionaireQ7ProductId1').is(':disabled')) {
			//textbox is disabled
		} else {
			if($('#QuestionaireQ7ProductId1').val() == "" && $('#QuestionaireQ7ProductId2').val() == "" && $('#QuestionaireQ7ProductId3').val() == "" && $('#QuestionaireQ7ProductId4').val() == "") {
				alert('উৎপাদনকারী ইউনিটের প্রধান প্রধান উৎপাদিত দ্রব্যাদির কোড প্রবেশ করান');
				return false;
			}
		}
		//END of Q 7 Validation

		//Q 8 Validation
		if($('#QuestionaireQ8ServiceId1').is(':disabled')) {
			//textbox is disabled
		} else {

			if($('#QuestionaireQ8ServiceId1').val() == "" && $('#QuestionaireQ8ServiceId2').val() == "" && $('#QuestionaireQ8ServiceId3').val() == "" && $('#QuestionaireQ8ServiceId4').val() == "") {
				alert('মেরামত/বিক্রয়/সেবা প্রদানকারী ইউনিটের কাজের কোড প্রবেশ করান');
				return false;
			}
		}
		//END of Q 8 Validation

		//Q 17 final validation
		var value = $('#QuestionaireQ17HrMale').val() + $('#QuestionaireQ17HrFemale').val() + $('#QuestionaireQ17HrMaleFoc').val() + $('#QuestionaireQ17HrFemaleFoc').val() + $('#QuestionaireQ17HrMaleFulltime').val() + $('#QuestionaireQ17HrFemaleFulltime').val() + $('#QuestionaireQ17HrMaleParttime').val() + $('#QuestionaireQ17HrFemaleParttime').val() + $('#QuestionaireQ17HrMaleIrregular').val() + $('#QuestionaireQ17HrFemaleIrregular').val();
		var sum = parseInt(value, 10);

		if(sum < 1) {
			alert('অর্থনৈতিক কর্মকান্ডে নিয়োজিত জনবলের সংখ্যা শুন্য (0)');
			return false;
		}
		//END OF Q 17 final validation

		var myval = parseInt($('#QuestionaireQ5UnitHeadEconomyId').val(), 10);
		if($('#QuestionaireQ4UnitType').val() == '1') {
			if(myval == 1) {
				var value = confirm("এই প্রশ্নপত্রটি পূরণ করার দরকার নেই। পরবর্তী প্রশ্নপত্রে যান। ");
				if(value) {
					submit_form();
				} else {
					$('#QuestionaireQ5UnitHeadEconomyId').val("");
				}
				return false;
			}

		}
		
		if($('#QuestionaireQ27YearVatRegistered').is(':disabled')) {
            
        } else {
        	var val = $('#QuestionaireQ27YearVatRegistered').val();

            if(val.length != 4) {
                alert('মূসক (ভ্যাট) নিবন্ধন করা সাল টি সঠিক নয়');
                return false;
            }
        }

	});

});

function validateEmail(emailaddress) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(!emailReg.test(emailaddress)) {
		return false;
	} else {
		return true;
	}
}