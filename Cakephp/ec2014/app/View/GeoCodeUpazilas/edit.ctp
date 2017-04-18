<script>

var  zilaCode = new Array();

$(document).ready(function() {
	
		$('#GeoCodeUpazilaDivns').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/edit');
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



<?php echo $this->Session->flash(); ?>
<div class="geoCodeUpazilas form">
<?php echo $this->Form->create('GeoCodeUpazila'); ?>
	<fieldset>
		<legend><?php echo __('Edit Upazila'); ?></legend>
	<?php
		echo $this->Form->input('id'); 
        echo $this->Form->input('divns', array('label' => 'বিভাগ', 'options' => $divn)); 		    
        
		$options = array($this->request->data['GeoCodeZila']['id'] => $this->request->data['GeoCodeZila']['zila_name']);
		
        echo $this->Form->input('geo_code_zila_id', array('label' => 'জেলা','options' => $options));
		
		echo $this->Form->input('upzila_code', array('empty' => '', 'label' => 'উপজেলা কোড'));
		echo $this->Form->input('upzila_name', array('empty' => '', 'label' => 'উপজেলা নাম'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GeoCodeUpazila.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GeoCodeUpazila.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Upazilas'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
