<script>


var  zilaCode = new Array();
$(document).ready(function() {
	
		$('#GeoCodeUpazilaDivns').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getZilaName";
			//var data = 'id=' + selectvalue;
			$("#GeoCodeUpazilaGeoCodeZilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_divn_id : selectvalue
				},
				success : function(data) {
					
					$("#GeoCodeUpazilaGeoCodeZilaId").empty();
					$("#GeoCodeUpazilaGeoCodeZilaId").append($("<option />").val("").text(""));
					zilaCode = new Array();
					$.each(data, function(index, element) {	
						$("#GeoCodeUpazilaGeoCodeZilaId").append($("<option />").val(index).text(element));
					});
				}
			});
			});	
});
		
		
		
		
</script>





<!-- ********************************************FORM START********************************************************** -->
<?php echo $this->Session->flash(); ?>
<div class="geoCodeUpazilas form">
<?php echo $this->Form->create('GeoCodeUpazila'); ?>
	<fieldset>
		<legend><?php echo __('Add Upazila'); ?></legend>
	<?php
	
	    echo $this->Form->input('divns', array('empty' => '','label' => 'বিভাগ')); 		
		echo $this->Form->input('geo_code_zila_id', array('empty' => '', 'label' => 'জেলা'));
		echo $this->Form->input('upzila_code', array('empty' => '', 'label' => 'উপজেলা কোড'));
		echo $this->Form->input('upzila_name', array('empty' => '', 'label' => 'উপজেলা নাম'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Upazilas List'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__(' Zilas List'), array('controller' => 'GeoCodeZilas', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
