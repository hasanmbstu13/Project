// JS file for  view/QuesCheck/Edit_details

$(document).ready(function() {

    // Enable disable checking depending on Field value on edit page
    //**************************************************************

    if($('#QuesCheckQ4UnitType').val() == "1") {
        $("#QuesCheckQ4UnitOrgType").attr("disabled", "disabled");
        $("#QuesCheckQ9LegalEntityTypeId").attr("disabled", "disabled");
    } else {
        $("#QuesCheckQ4UnitOrgType").removeAttr("disabled");
        $("#QuesCheckQ9LegalEntityTypeId").removeAttr("disabled");
    }

    if($('#QuesCheckQ10IsNbrInvestment').val() == "1") {
        $("#QuesCheckQ10NbrAmountInThou").removeAttr("disabled");
    }

    if($('#QuesCheckQ11IsRegistered').val() == "1") {
        $("#QuesCheckQ11RegistrarId").removeAttr("disabled");
    }

    if($('#QuesCheckQ14IsAccountable').val() == "1") {
        $("#QuesCheckQ14AccountableDuration").removeAttr("disabled");
    }

    if($('#QuesCheckQ22IsFireSecured').val() == "1") {
        $("#QuesCheckQ22IsFireDeviceMaintained").removeAttr("disabled");
    }

    if($('#QuesCheckQ24IsToiletAvailable').val() == "1") {
        $("#QuesCheckQ24IsLadiesToiletAvailable").removeAttr("disabled");
    }

    if($('#QuesCheckQ26IsVatRegistered').val() == "1") {
        $("#QuesCheckQ27YearVatRegistered").removeAttr("disabled");
    }

    // When Edit page display, this code Fetches Code wise value From func.js file for Q.9 to Q.26

    $('#q9details').html(option_q9[ parseInt($('#QuesCheckQ9LegalEntityTypeId').val(), 10)]);
    $('#q10_details').html(option_q10[$('#QuesCheckQ10IsNbrInvestment').val()]);
    $('#q11details').html(option_q11_1[$('#QuesCheckQ11IsRegistered').val()]);
    $('#q11_1details').html(option_q11[parseInt($('#QuesCheckQ11RegistrarId').val(), 10) ]);
    $('#q13details').html(option_q13[$('#QuesCheckQ13SaleProcedure').val()]);
    $('#q14details').html(option_q14[$('#QuesCheckQ14IsAccountable').val()]);
    $('#q14_1details').html(option_q14_1[$('#QuesCheckQ14AccountableDuration').val()]);
    $('#q15_1details').html(option_q15_1[$('#QuesCheckQ15SalaryInstr').val()]);
    $('#q15_2details').html(option_q15_2[$('#QuesCheckQ15SalaryPeriod').val()]);
    $('#q16details').html(option_q16[$('#QuesCheckQ16FixedCapital').val()]);
    $('#q18details').html(option_q18[$('#QuesCheckQ18MachineUses').val()]);
    $('#q19details').html(option_q19[$('#QuesCheckQ19Marketing').val()]);
    $('#q20details').html(option_q20[$('#QuesCheckQ20FuelUses').val()]);
    $('#q25details').html(option_q25[$('#QuesCheckQ25IsTinRegistered').val()]);
    $('#q21details').html(option_yes_no[$('#QuesCheckQ21IsItEnabled').val()]);
    $('#q22details').html(option_yes_no[$('#QuesCheckQ22IsFireSecured').val()]);
    $('#q22_1details').html(option_yes_no[$('#QuesCheckQ22IsFireDeviceMaintained').val()]);
    $('#q23details').html(option_yes_no[$('#QuesCheckQ23IsGarbageProper').val()]);
    $('#q24details').html(option_yes_no[$('#QuesCheckQ24IsToiletAvailable').val()]);
    $('#q24_1details').html(option_yes_no[$('#QuesCheckQ24IsLadiesToiletAvailable').val()]);
    $('#q25details').html(option_yes_no[$('#QuesCheckQ25IsTinRegistered').val()]);
    $('#q26details').html(option_yes_no[$('#QuesCheckQ26IsVatRegistered').val()]);

    var q6value = $('#QuesCheckQ6EconomyId').val();
    //console.log(q6value);
    qus7_8enable_disable(q6value);
});

function qus7_8enable_disable(value) {
    
    if(parseInt(value, 10) >= 111 && parseInt(value, 10) <= 3412) {
        q7enable();
        q8enable();
        q24enable();
        if(value.length == 4) {
            //autoFocus("QuestionaireQ7ProductId1");
        }
        autoFocusQ = 18;
        return false;
    }
    if((parseInt(value, 10) >= 3413 && parseInt(value, 10) <= 3509) || parseInt(value, 10) > 9900) {

        if(value.length == 4) {

            q7enable();
            q8enable();
            q24disable();
            $(this).val("");
            alert("ভুল শিল্প কোড");
            autoFocusQ = 25;

        }
    } else {

        if(value.length == 4) {

            q7enable();
            q8enable();
            q24disable();
            autoFocusQ = 25;
        }
    }

}
