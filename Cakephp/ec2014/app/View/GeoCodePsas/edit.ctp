<script>


var  zilaCode = new Array();
var  upaZilaCode = new Array();

$(document).ready(function() {
	
	
	
// GET ZILA	
		$('#GeoCodePsaDivns').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/edit');
			path = path[0] + "/getZilaName";
			//var data = 'id=' + selectvalue;
			$("#GeoCodePsaGeoCodeZilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_divn_id : selectvalue
				},
				success : function(data) {
					
					$("#GeoCodePsaGeoCodeZilaId").empty();
					$("#GeoCodePsaGeoCodeZilaId").append($("<option />").val("").text(""));
					zilaCode = new Array();
					$.each(data, function(index, element) {	
						$("#GeoCodePsaGeoCodeZilaId").append($("<option />").val(index).text(element));
					});
				}
			});
			});	
			
			
			
// 	GET UPAZILA		
			
			$('#GeoCodePsaGeoCodeZilaId').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/edit');
			path = path[0] + "/getUpaZila";
			//var data = 'id=' + selectvalue;
			$("#GeoCodePsaGeoCodeUpazilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_zila_id : selectvalue
				},
				success : function(data) {
					
					$("#GeoCodePsaGeoCodeUpazilaId").empty();
					$("#GeoCodePsaGeoCodeUpazilaId").append($("<option />").val("").text(""));
					upaZilaCode = new Array();
					$.each(data, function(index, element) {	
						$("#GeoCodePsaGeoCodeUpazilaId").append($("<option />").val(element.GeoCodeUpazila.id).text(element.GeoCodeUpazila.upzila_name));
					});
				}
			});
			});	
});
		
</script>



<?php echo $this->Session->flash(); ?>
<div class="geoCodePsas form">
<?php echo $this->Form->create('GeoCodePsa'); ?>
	<fieldset>
		<legend><?php echo __('Edit PSA'); ?></legend>
	<?php
		echo $this->Form->input('id');
		
		$options = array($this->request->data['GeoCodeUpazila']['id'] => $this->request->data['GeoCodeUpazila']['upzila_name']);
		
		 echo $this->Form->input('divns', array('label' => 'বিভাগ', 'options' => $divns)); 
		echo $this->Form->input('geo_code_zila_id', array('empty' => '', 'label' => 'জেলা'));
		echo $this->Form->input('geo_code_upazila_id', array( 'label' => 'উপজেলা ', 'options' => $options));
		
		
		//echo $this->Form->input('geo_code_upazila_id', array('label' => 'উপজেলা ','options' => $geoCodeUpazilas));
		echo $this->Form->input('psa_code', array('empty' => '', 'label' =>' পৌরসভা কোড '));
		echo $this->Form->input('psa_name', array('empty' => '','label' => 'পৌরসভা নাম '));
		echo $this->Form->input('geo_code_rmo_id', array('empty' => '','label' => 'আর.এম.ও '));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Add PSA'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete PSA'), array('action' => 'delete', $this->Form->value('GeoCodePsa.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GeoCodePsa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List PSA'), array('action' => 'index')); ?></li>
	
	</ul>
</div>
