$(document).ready(function() {

    var pathname = window.location.pathname;
    var path = pathname.split('/Reports');
    path_load = path[0];

    get_divn(path_load);

    $('#divn_id').change(function() {
            var selectvalue = $(this).val();
            var path = path_load + "/Reports/get_geo_zila";
            $("#zila_id").empty();
            $("#zila_id").append($("<option />").val("").text("Please Select"));

            if(selectvalue == "") 
            {
            	$("#divn_text").val("");
            	return false;
            }
            else
            {
            	$("#divn_text").val($("#divn_id option:selected").text());
            }
            

            $.ajax({
                    url : path,
                    type : "POST",
                    dataType : 'json',
                    data : {
                        divn_id : selectvalue
        
                    },
                    success : function(data) {
                        if($.isEmptyObject(data))
                        {
                            alert("No Data Found");
                        }
                        else
                        {
                            $.each(data, function(index, element) {
                                $("#zila_id").append($("<option />").val(element.GeoCodeZila.id).text(element.GeoCodeZila.zila_name + " (" + element.GeoCodeZila.zila_code + ")"));
                            });
                        }
                    }
          });
    });


$('#zila_id').change(function() {

            var selectvalue = $(this).val();
            var path = path_load + "/Reports/get_geo_upazila";
            $("#upazila_id").empty();
            $("#upazila_id").append($("<option />").val("").text("Please Select"));  

            if(selectvalue == "") 
            {
            	$("#zila_text").val("");
            	return false;
            }
            else
            {
            	$("#zila_text").val($("#zila_id option:selected").text());
            }

            $.ajax({
                    url : path,
                    type : "POST",
                    dataType : 'json',
                    data : {
                        zila_id : selectvalue
        
                    },
                    success : function(data) {
                        if($.isEmptyObject(data))
                        {
                            alert("No Data Found");
                        }
                        else
                        {
                            $.each(data, function(index, element) {
                                $("#upazila_id").append($("<option />").val(element.GeoCodeUpazila.id).text(element.GeoCodeUpazila.upzila_name + " (" + element.GeoCodeUpazila.upzila_code + ")"));
                            });
                        }
                    }
                });
    });



$('#upazila_id').change(function() {

            var selectvalue = $(this).val();
            var path = path_load + "/Reports/get_geo_psa";
            $("#psa_id").empty();
            $("#union_id").empty();
            $("#psa_id").append($("<option />").val("").text("Please Select"));     
            $("#union_id").append($("<option />").val("").text("Please Select")); 

            if(selectvalue == "") 
            {
            	$("#upazila_text").val("");
            	return false;
            }
            else
            {
            	$("#upazila_text").val($("#upazila_id option:selected").text());
            }

            $.ajax({
                    url : path,
                    type : "POST",
                    dataType : 'json',
                    data : {
                        upazila_id : selectvalue
        
                    },
                    success : function(data) {
                       
                            $.each(data.psa, function(index, element) {
                                $("#psa_id").append($("<option />").val(element.GeoCodePsa.id).text(element.GeoCodePsa.psa_name + " (" + element.GeoCodePsa.psa_code + ")"));
                            });
                            $.each(data.union, function(index, element) {
                               
                                $("#union_id").append($("<option />").val(element.GeoCodeUnion.id).text(element.GeoCodeUnion.union_name + " (" + element.GeoCodeUnion.union_code + ")"));
                            });
                      
                    }
                });
        });
    
    $('#psa_id').change(function() {
        var selectvalue = $(this).val();
        if(selectvalue == "") 
        {
            $("#psa_text").val("");
            return false;
        }
        else
        {
            $("#psa_text").val($("#psa_id option:selected").text());
        }

    });

    $('#union_id').change(function() {
        var selectvalue = $(this).val();
        if(selectvalue == "") 
        {
            $("#union_text").val("");
            return false;
        }
        else
        {
            $("#union_text").val($("#union_id option:selected").text());
        }

    });

    $("#print_btn").click(function() {
        var divToPrint = document.getElementById('table_for_print');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    });

    $("#export_to_excel").click(function() {
        $("#tblExport").btechco_excelexport({
                containerid: "tblExport"
               , datatype: $datatype.Table
        });
    });

    $("#export_to_excel2").click(function() {
        $("#tblExport2").btechco_excelexport({
                containerid: "tblExport2"
               , datatype: $datatype.Table
        });
    });

});



function get_divn(path_load)
{  
    var path = path_load + "/Reports/get_geo_divn";
    $("#divn_id").empty();
    $("#divn_id").append($("<option />").val("").text("Please Select"));     
    $.ajax({
            url : path,
            type : "POST",
            dataType : 'json',
            data : {
  
            },
            success : function(data) {
                if($.isEmptyObject(data))
            	{
            		alert("No Data Found");
            	}
            	else
            	{
            		$.each(data, function(index, element) {
	            		$("#divn_id").append($("<option />").val(element.GeoCodeDivn.id).text(element.GeoCodeDivn.divn_name + " (" + element.GeoCodeDivn.divn_code + ")"));
	            	});
            	}
            }
        });
}   


