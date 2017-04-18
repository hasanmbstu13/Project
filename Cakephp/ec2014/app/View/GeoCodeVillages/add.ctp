<script>


var  zilaCode = new Array();
var  upaZilaCode = new Array();
var unionCode = new Array();
var unionMauza = new Array();

$(document).ready(function() {
    
    
    
// GET ZILA 
        $('#GeoCodeVillageDivns').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getZilaName";
            //var data = 'id=' + selectvalue;
            $("#GeoCodeVillageGeoCodeZilaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_divn_id : selectvalue
                },
                success : function(data) {
                    
                    $("#GeoCodeVillageGeoCodeZilaId").empty();
                    $("#GeoCodeVillageGeoCodeZilaId").append($("<option />").val("").text(""));
                    zilaCode = new Array();
                    $.each(data, function(index, element) { 
                        $("#GeoCodeVillageGeoCodeZilaId").append($("<option />").val(index).text(element));
                    });
                }
            });
            }); 
            
            
            
//  GET UPAZILA     
            
            $('#GeoCodeVillageGeoCodeZilaId').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getUpaZila";
            //var data = 'id=' + selectvalue;
            $("#GeoCodeVillageGeoCodeUpazilaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_zila_id : selectvalue
                },
                success : function(data) {
                    
                    $("#GeoCodeVillageGeoCodeUpazilaId").empty();
                    $("#GeoCodeVillageGeoCodeUpazilaId").append($("<option />").val("").text(""));
                    upaZilaCode = new Array();
                    $.each(data, function(index, element) { 
                        $("#GeoCodeVillageGeoCodeUpazilaId").append($("<option />").val(element.GeoCodeUpazila.id).text(element.GeoCodeUpazila.upzila_name));
                    });
                }
            });
            }); 
            
         
 //  GET UNION        
            
            // $('#GeoCodeVillageGeoCodeUpazilaId').change(function() {
            // var selectvalue = $(this).val();
            // var pathname = window.location.pathname;
            // var path = pathname.split('/add');
            // path = path[0] + "/getUnion";
            // //var data = 'id=' + selectvalue;
            // $("#GeoCodeVillageGeoCodeUnionId").empty();
            // $.ajax({
            //     url : path,
            //     type : "POST",
            //     dataType : 'json',
            //     data : {
            //         geo_code_upazila_id : selectvalue
            //     },
            //     success : function(data) {
                    
            //         $("#GeoCodeVillageGeoCodeUnionId").empty();
            //         $("#GeoCodeVillageGeoCodeUnionId").append($("<option />").val("").text(""));
            //         var unionCode = new Array();
            //         $.each(data, function(index, element) { 
            //             $("#GeoCodeVillageGeoCodeUnionId").append($("<option />").val(element.GeoCodeUnion.id).text(element.GeoCodeUnion.union_name));
            //         });
            //     }
            // });
            // });            
            

 
  //  GET MAUZA     
            
            $('#GeoCodeVillageGeoCodeUnionId').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getMuza";
            //var data = 'id=' + selectvalue;
            $("#GeoCodeVillageMuzaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_union_id : selectvalue
                },
                success : function(data) {
                    
                    $("#GeoCodeVillageMuzaId").empty();
                    $("#GeoCodeVillageMuzaId").append($("<option />").val("").text(""));
                    var unionMauza = new Array();
                    $.each(data, function(index, element) { 
                        $("#GeoCodeVillageMuzaId").append($("<option />").val(element.GeoCodeMauza.id).text(element.GeoCodeMauza.mauza_name));
                    });
                }
            });
            }); 
    // GET PSA

          $('#GeoCodeVillageGeoCodeUpazilaId').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getPSA";
            var data = 'id=' + selectvalue;
            $("#GeoCodeVillageGeoCodePsaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_upazila_id : selectvalue,
                },
                success : function(data) {
                    
                  
                    $("#GeoCodeVillageGeoCodePsaId").append($("<option />").val("").text(""));
                    psaCode = new Array();
                    $.each(data, function(index, element) {
                        
                        psaCode[element.GeoCodePsa.id] = element.GeoCodePsa.psa_code;
                        $("#GeoCodeVillageGeoCodePsaId").append($("<option />").val(element.GeoCodePsa.id).text(element.GeoCodePsa.psa_name));
                    });
                    $("#GeoCodeVillageGeoCodePsaId").append($("<option />").val('NON_PSA').text("NON PSA/CC"));
                }
            });  
         });  
      //GET Union With NonPSA
        $('#GeoCodeVillageGeoCodePsaId').change(function() {
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getUnionWithNonPSA";
            $("#GeoCodeVillageGeoCodeUnionId").empty();
            var psa;
            if($('#GeoCodeVillageGeoCodePsaId').val() == "NON_PSA") psa = 1;
            else if($('#GeoCodeVillageGeoCodePsaId').val() != "") psa = 2;
            else return false;
            

            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_upazila_id : $('#GeoCodeVillageGeoCodeUpazilaId').val(),
                    geo_code_psa_nonpsa : psa,
                    geo_code_psa_id : $('#GeoCodeVillageGeoCodePsaId').val()
                    

                },
                success : function(data) {
                    unionCode = new Array();
                    $("#GeoCodeVillageGeoCodeUnionId").append($("<option />").val("").text(""));
                    $.each(data, function(index, element) {
                        unionCode[element.GeoCodeUnion.id] = element.GeoCodeUnion.union_code;
                        $("#GeoCodeVillageGeoCodeUnionId").append($("<option />").val(element.GeoCodeUnion.id).text(element.GeoCodeUnion.union_name));
                    });

                }
            });
        });        
            
 });// End of Document ready
       
</script>





<?php echo $this->Session->flash(); ?>

<div class="geoCodeVillages form">
<?php echo $this->Form->create('GeoCodeVillage'); ?>
	<fieldset>
		<legend><?php echo __('Add Village'); ?></legend>
	<?php
	    echo $this->Form->input('divns', array('empty' => '','label' => 'বিভাগ','required' => 'required'));         
        echo $this->Form->input('geo_code_zila_id', array('empty' => '', 'label' => 'জেলা','required' => 'required'));            
        echo $this->Form->input('geo_code_upazila_id', array('empty' => '','label' => 'উপজেলা/থানা','required' => 'required'));
        echo $this -> Form -> input('geo_code_psa_id', array('empty' => '', 'label' => 'পৌরসভা/সিটি কর্পোরেশন','required' => 'required'));
        echo $this->Form->input('geo_code_union_id', array('empty' => '', 'label' => 'ইউনিয়ন/ওয়ার্ড','required' => 'required'));
		echo $this->Form->input('muza_id', array('empty' => '','label' => 'মৌজা  নাম','required' => 'required'));
		echo $this->Form->input('village_code', array('empty' => '','label' => 'গ্রামের  কোড','required' => 'required'));
		echo $this->Form->input('village_name', array('empty' => '','label' => 'গ্রামের  নাম','required' => 'required'));
		echo $this->Form->input('geo_code_rmo_id', array('empty' => '','label' => 'আর.এম.ও','required' => 'required'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Villages'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
