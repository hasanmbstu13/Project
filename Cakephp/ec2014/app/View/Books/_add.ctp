<?php echo $this->Session->flash(); ?>
<script>

function bookIdGenerator()
{
	var value = $('#BookGeoCodeDivnId').val()+$('#BookGeoCodeZilaId').val()+$('#BookGeoCodeUpazilaId').val()+$('#BookGeoCodeUnionId').val();
	$('#BookBookCode').val(value);
}


//  Collecting data by ajax request using json
	$(document).ready(function() {
		
		$("#BookBookCode2").live("keydown", function (e) 
		 { 
		     var key = e.charCode || e.keyCode || 0;
		     // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
		     return (
		     key == 8 || 
		     key == 9 ||
		     key == 46 ||
		     (key >= 37 && key <= 40) ||
		     (key >= 48 && key <= 57) ||
		     (key >= 96 && key <= 105));
		 });


	    
		$('#BookGeoCodeDivnId').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getZila";
			var data = 'id=' + selectvalue;
			$("#BookGeoCodeZilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_divn_id : selectvalue
				},
				success : function(data) {
					$("#BookGeoCodeZilaId").append($("<option />").val("").text(""));
					$.each(data, function(index, element) {
						$("#BookGeoCodeZilaId").append($("<option />").val(index).text(element));
					});
				}
			});
		});

		$('#BookGeoCodeZilaId').change(function() {
			var selectvalue = $(this).val();
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getUpaZila";
			var data = 'id=' + selectvalue;
			$("#BookGeoCodeUpazilaId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_zila_id : selectvalue
				},
				success : function(data) {
					$("#BookGeoCodeUpazilaId").append($("<option />").val("").text(""));
					$.each(data, function(index, element) {
						$("#BookGeoCodeUpazilaId").append($("<option />").val(index).text(element));
					});


				}
			});
		});
		
		$('#BookGeoCodeRmoId').change(function() {
			var selectvalue = $(this).val();
			if(selectvalue == "1")
			{
				$("#BookGeoCodePsaId").val("");
				$("#BookGeoCodePsaId").prop('disabled', true);
			}
			else
			{
				$("#BookGeoCodePsaId").prop('disabled', false);
			}
			
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getUnion";
			var data = 'id=' + selectvalue;
			$("#BookGeoCodeUnionId").empty();
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_upazila_id : $('#BookGeoCodeUpazilaId').val(),
					geo_code_rmo_id : selectvalue,
				},
				success : function(data) {
					$("#BookGeoCodeUnionId").append($("<option />").val("").text(""));
					$.each(data, function(index, element) {
						$("#BookGeoCodeUnionId").append($("<option />").val(index).text(element));
					});
				}
			});
		});
		
		$('#BookGeoCodeUnionId').change(function() {
			var selectvalue = $(this).val();
			
			
			var pathname = window.location.pathname;   
			var path = pathname.split('/add');
			path = path[0] + "/getBookCode";
			var data = 'id=' + selectvalue;
	
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_union_id : selectvalue,
					geo_code_divn_id : $('#BookGeoCodeDivnId').val(),
					geo_code_zila_id : $('#BookGeoCodeZilaId').val(),
					geo_code_upazila_id : $('#BookGeoCodeUpazilaId').val()
				},
				success : function(data) {
					
					$('#BookBookCode').val(data);
				}
			});
		});
		
		$('#BookGeoCodeUpazilaId').change(function() {
			var selectvalue = $(this).val();
			
			var pathname = window.location.pathname;
			var path = pathname.split('/add');
			path = path[0] + "/getPSA";
			var data = 'id=' + selectvalue;
			$("#BookGeoCodePsaId").empty();
			$("#BookGeoCodePsaId").append($("<option />").val("").text(""));
			$.ajax({
				url : path,
				type : "POST",
				dataType : 'json',
				data : {
					geo_code_upazila_id : selectvalue,
				},
				success : function(data) {
					$.each(data, function(index, element) {
						$("#BookGeoCodePsaId").append($("<option />").val(index).text(element));
				});
				}
			});
		});
		
		
	}); 

$("#BookGeoCodeRmoId").live("keydown", function (e) 
   {
       var key = e.charCode || e.keyCode || 0;
       var val = $(this).val();
       if ((val.length != 1 || val == 0 || val == 6 || val == 7 || val == 8) && key == 9 ) return (key != 9);
   });



/* 
jQuery.fn.ForceNumericOnly =

function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

$("#yourTextBoxName").ForceNumericOnly(); */

</script>

<div class="books form">
<?php echo $this->Form->create('Book'); ?>
	<fieldset>
		<legend><?php echo __('Book Information'); ?></legend>
	<?php
		
		echo $this->Form->input('geo_code_divn_id', array('empty' => '', 'autofocus' => 'autofocus'));
		echo $this->Form->input('geo_code_zila_id', array('empty' => ''));
		echo $this->Form->input('geo_code_upazila_id', array('empty' => ''));
		echo $this->Form->input('geo_code_rmo_id', array('empty' => '', 'label' => 'Rmo Type'));
		echo $this->Form->input('geo_code_psa_id', array('empty' => ''));
		echo $this->Form->input('geo_code_union_id', array('empty' => '', 'label' => 'Geo Code Union/Ward'));
		//echo $this->Form->input('entry_by');
		//echo $this->Form->input('book_code', array('style' => 'width:100px'));
	?>	


<div class="input text required">
	<label for="BookBookCode" style="width: 176px; ">Book Code</label>
	
	<input id="BookBookCode" type="text" maxlength="50"  style="width:110px; text-align: center;" name="data[Book][book_code]" readonly="readonly" required="required">
	
	<input id="BookBookCode2" type="text" maxlength="2" text-align: "center" style="width:87px ;  text-align: center;" name="data[Book][book_code2]"  required="required">	
</div>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Books'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Book Organizations'), array('controller' => 'book_organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Organization'), array('controller' => 'book_organizations', 'action' => 'add')); ?> </li>
		
		<!-- 
		<li><?php echo $this->Html->link(__('New Geo Code Divn'), array('controller' => 'geo_code_divns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Divns'), array('controller' => 'geo_code_divns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Zilas'), array('controller' => 'geo_code_zilas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Zila'), array('controller' => 'geo_code_zilas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Upazilas'), array('controller' => 'geo_code_upazilas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Upazila'), array('controller' => 'geo_code_upazilas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Rmos'), array('controller' => 'geo_code_rmos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Rmo'), array('controller' => 'geo_code_rmos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Psas'), array('controller' => 'geo_code_psas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Psa'), array('controller' => 'geo_code_psas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Unions'), array('controller' => 'geo_code_unions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Union'), array('controller' => 'geo_code_unions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'questionaires', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
