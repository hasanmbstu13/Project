<script>
	var zilaCode = new Array();
	var upaZilaCode = new Array();
	var unionCode = new Array();

	$(document).ready(function() {

		// GET ZILA
		$('#GeoCodeMauzaDivns').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getZilaName";
			//var data = 'id=' + selectvalue;
			$("#GeoCodeMauzaGeoCodeZilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_divn_id : selectvalue
				},
				success : function(data) {

					$("#GeoCodeMauzaGeoCodeZilaId").empty();
					$("#GeoCodeMauzaGeoCodeZilaId").append($("<option />").val("").text(""));
					zilaCode = new Array();
					$.each(data, function(index, element) {
						$("#GeoCodeMauzaGeoCodeZilaId").append($("<option />").val(index).text(element));
					});
				}
			});
		});

		//  GET UPAZILA

		$('#GeoCodeMauzaGeoCodeZilaId').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getUpaZila";
			//var data = 'id=' + selectvalue;
			$("#GeoCodeMauzaGeoCodeUpazilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_zila_id : selectvalue
				},
				success : function(data) {

					$("#GeoCodeMauzaGeoCodeUpazilaId").empty();
					$("#GeoCodeMauzaGeoCodeUpazilaId").append($("<option />").val("").text(""));
					upaZilaCode = new Array();
					$.each(data, function(index, element) {
						$("#GeoCodeMauzaGeoCodeUpazilaId").append($("<option />").val(element.GeoCodeUpazila.id).text(element.GeoCodeUpazila.upzila_name));
					});
				}
			});
		});

		//  GET UNION

		// $('#GeoCodeMauzaGeoCodePsaId').change(function() {
		// 	var selectvalue = $(this).val();
		// 	var pathname = window.location.pathname;
		// 	var path = pathname.split('/add');
		// 	path = path[0] + "/getUnion";
		// 	//var data = 'id=' + selectvalue;
		// 	$("#GeoCodeMauzaGeoCodeUnionId").empty();
		// 	$.ajax({
		// 		url : path,
		// 		type : "POST",
		// 		dataType : 'json',
		// 		data : {
		// 			geo_code_upazila_id : selectvalue
		// 		},
		// 		success : function(data) {

		// 			$("#GeoCodeMauzaGeoCodeUnionId").empty();
		// 			$("#GeoCodeMauzaGeoCodeUnionId").append($("<option />").val("").text(""));
		// 			var unionCode = new Array();
		// 			$.each(data, function(index, element) {
		// 				$("#GeoCodeMauzaGeoCodeUnionId").append($("<option />").val(element.GeoCodeUnion.id).text(element.GeoCodeUnion.union_name));
		// 			});
		// 		}
		// 	});
		// });
    // GET PSA

          $('#GeoCodeMauzaGeoCodeUpazilaId').change(function() {
            var selectvalue = $(this).val();
            var pathname = window.location.pathname;
            var path = pathname.split('/add');
            path = path[0] + "/getPSA";
            var data = 'id=' + selectvalue;
            $("#GeoCodeMauzaGeoCodePsaId").empty();
            $.ajax({
                url : path,
                type : "POST",
                dataType : 'json',
                data : {
                    geo_code_upazila_id : selectvalue,
                },
                success : function(data) {
                    
                    $("#GeoCodeMauzaGeoCodePsaId").empty();
                    $("#GeoCodeMauzaGeoCodePsaId").append($("<option />").val("").text(""));
                    psaCode = new Array();
                    $.each(data, function(index, element) {
                        
                        psaCode[element.GeoCodePsa.id] = element.GeoCodePsa.psa_code;
                        $("#GeoCodeMauzaGeoCodePsaId").append($("<option />").val(element.GeoCodePsa.id).text(element.GeoCodePsa.psa_name));
                    });
                    $("#GeoCodeMauzaGeoCodePsaId").append($("<option />").val('NON_PSA').text("NON PSA/CC"));
                }
            });

            
        }); 

      //GET Union With NonPSA
		$('#GeoCodeMauzaGeoCodePsaId').change(function() {
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getUnionWithNonPSA";
			$("#GeoCodeMauzaGeoCodeUnionId").empty();
			var psa;
			if($('#GeoCodeMauzaGeoCodePsaId').val() == "NON_PSA") psa = 1;
			else if($('#GeoCodeMauzaGeoCodePsaId').val() != "") psa = 2;
			else return false;
			

			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_upazila_id : $('#GeoCodeMauzaGeoCodeUpazilaId').val(),
					geo_code_psa_nonpsa : psa,
					geo_code_psa_id : $('#GeoCodeMauzaGeoCodePsaId').val()
					

				},
				success : function(data) {
					$("#GeoCodeMauzaGeoCodeUnionId").empty();
					unionCode = new Array();
					$("#GeoCodeMauzaGeoCodeUnionId").append($("<option />").val("").text(""));
					$.each(data, function(index, element) {
						unionCode[element.GeoCodeUnion.id] = element.GeoCodeUnion.union_code;
						$("#GeoCodeMauzaGeoCodeUnionId").append($("<option />").val(element.GeoCodeUnion.id).text(element.GeoCodeUnion.union_name));
					});

				}
			});
		});

	});



</script>

<?php echo $this -> Session -> flash(); ?>
<div class="geoCodeMauzas form">
	<?php echo $this -> Form -> create('GeoCodeMauza'); ?>
	<fieldset>
		<legend>
			<?php echo __('Add Mauza'); ?>
		</legend>
		<?php echo $this -> Form -> input('divns', array('empty' => '', 'label' => 'বিভাগ','required' => 'required'));
		echo $this -> Form -> input('geo_code_zila_id', array('empty' => '', 'label' => 'জেলা','required' => 'required'));
		echo $this -> Form -> input('geo_code_upazila_id', array('empty' => '', 'label' => 'উপজেলা/থানা','required' => 'required'));
		 echo $this -> Form -> input('geo_code_psa_id', array('empty' => '', 'label' => 'পৌরসভা/সিটি কর্পোরেশন','required' => 'required'));
		echo $this -> Form -> input('geo_code_union_id', array('empty' => '', 'label' => 'ইউনিয়ন/ওয়ার্ড','required' => 'required'));
		echo $this -> Form -> input('mauza_code', array('empty' => '', 'label' => 'মৌজা  কোড','required' => 'required'));
		echo $this -> Form -> input('mauza_name', array('empty' => '', 'label' => 'মৌজা  নাম','required' => 'required'));
		echo $this -> Form -> input('geo_code_rmo_id', array('empty' => '','label' => 'আর এম ও','required' => 'required'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li>
			<?php echo $this -> Html -> link(__('List Mauzas'), array('action' => 'index')); ?>
		</li>

	</ul>
</div>
