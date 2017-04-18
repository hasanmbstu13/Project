<script>


var  zilaCode = new Array();
var  upaZilaCode = new Array();

$(document).ready(function() {
    
    
    
// GET ZILA 
        $('#GeoCodeUnionDivns').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getZilaName";
            //var data = 'id=' + selectvalue;
            $("#GeoCodeUnionGeoCodeZilaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_divn_id : selectvalue
                },
                success : function(data) {
                    
                    $("#GeoCodeUnionGeoCodeZilaId").empty();
                    $("#GeoCodeUnionGeoCodeZilaId").append($("<option />").val("").text(""));
                    zilaCode = new Array();
                    $.each(data, function(index, element) { 
                        $("#GeoCodeUnionGeoCodeZilaId").append($("<option />").val(index).text(element));
                    });
                }
            });
            }); 
            
            
            
//  GET UPAZILA     
            
            $('#GeoCodeUnionGeoCodeZilaId').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getUpaZila";
            //var data = 'id=' + selectvalue;
            $("#GeoCodeUnionGeoCodeUpazilaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_zila_id : selectvalue
                },
                success : function(data) {
                    
                    $("#GeoCodeUnionGeoCodeUpazilaId").empty();
                    $("#GeoCodeUnionGeoCodeUpazilaId").append($("<option />").val("").text(""));
                    upaZilaCode = new Array();
                    $.each(data, function(index, element) { 
                        $("#GeoCodeUnionGeoCodeUpazilaId").append($("<option />").val(element.GeoCodeUpazila.id).text(element.GeoCodeUpazila.upzila_name));
                    });
                }
            });
            });

//GET PSA 

      $('#GeoCodeUnionGeoCodeUpazilaId').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getPSA";
            var data = 'id=' + selectvalue;
            $("#GeoCodeUnionGeoCodePsaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_upazila_id : selectvalue,
                },
                success : function(data) {
                    
                    $("#GeoCodeUnionGeoCodePsaId").empty();
                    $("#GeoCodeUnionGeoCodePsaId").append($("<option />").val("").text(""));
                    psaCode = new Array();
                    $.each(data, function(index, element) {
                        
                        psaCode[element.GeoCodePsa.id] = element.GeoCodePsa.psa_code;
                        $("#GeoCodeUnionGeoCodePsaId").append($("<option />").val(element.GeoCodePsa.id).text(element.GeoCodePsa.psa_name));
                    });
                    $("#GeoCodeUnionGeoCodePsaId").append($("<option />").val('NON_PSA').text("NON PSA/CC"));
                }
            });

            
        }); 
});

 
        
</script>


<?php echo $this->Session->flash(); ?>
<div class="geoCodeUnions form">
<?php echo $this->Form->create('GeoCodeUnion'); ?>
	<fieldset>
		<legend><?php echo __('Add Union'); ?></legend>
	<?php
	
	    echo $this->Form->input('divns', array('empty' => '','label' => 'বিভাগ','required' => 'required')); 
        echo $this->Form->input('geo_code_zila_id', array('empty' => '', 'label' => 'জেলা','required' => 'required'));
        echo $this->Form->input('geo_code_upazila_id', array('empty' => '', 'label' => 'উপজেলা ','required' => 'required'));
        echo $this -> Form -> input('geo_code_psa_id', array('empty' => '', 'label' => 'পৌরসভা/সিটি কর্পোরেশন','required' => 'required'));
		echo $this->Form->input('union_code', array('empty' => '', 'label' => 'ইউনিয়ন কোড ','required' => 'required'));
		echo $this->Form->input('union_name', array('empty' => '', 'label' => 'ইউনিয়ন নাম','required' => 'required'));
		echo $this->Form->input('geo_code_rmo_id', array('empty' => '','label' => 'আর.এম.ও ','required' => 'required'));
		
		$options = array('' => '','UNION' => 'UNION', 'WARD' => 'WARD');
		echo $this -> Form -> input('union_or_ward', array('label' => 'ইউনিয়ন/ওয়ার্ড', 'options' => $options,'required' => 'required'));
					
		// echo $this->Form->input('union_or_ward');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Unions'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
