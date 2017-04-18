<?php echo $this->Session->flash(); ?>

<?php
if($questionaires[0]['Questionaire']['q4_unit_org_type'] == 0)$questionaires[0]['Questionaire']['q4_unit_org_type'] = NULL;

if($questionaires[0]['Questionaire']['q7_product_id_1'] != '') $questionaires[0]['Questionaire']['q7_product_id_1'] = str_pad($questionaires[0]['Questionaire']['q7_product_id_1'], 5, "0", STR_PAD_LEFT);

if($questionaires[0]['Questionaire']['q7_product_id_2'] != '') $questionaires[0]['Questionaire']['q7_product_id_2'] = str_pad($questionaires[0]['Questionaire']['q7_product_id_2'], 5, "0", STR_PAD_LEFT);


if($questionaires[0]['Questionaire']['q7_product_id_3'] != '') $questionaires[0]['Questionaire']['q7_product_id_3'] = str_pad($questionaires[0]['Questionaire']['q7_product_id_3'], 5, "0", STR_PAD_LEFT);


if($questionaires[0]['Questionaire']['q7_product_id_4'] != '') $questionaires[0]['Questionaire']['q7_product_id_4'] = str_pad($questionaires[0]['Questionaire']['q7_product_id_4'], 5, "0", STR_PAD_LEFT);


if($questionaires[0]['Questionaire']['q8_service_id_1'] != '') $questionaires[0]['Questionaire']['q8_service_id_1'] = str_pad($questionaires[0]['Questionaire']['q8_service_id_1'], 5, "0", STR_PAD_LEFT);

if($questionaires[0]['Questionaire']['q8_service_id_2'] != '') $questionaires[0]['Questionaire']['q8_service_id_2'] = str_pad($questionaires[0]['Questionaire']['q8_service_id_2'], 5, "0", STR_PAD_LEFT);

if($questionaires[0]['Questionaire']['q8_service_id_3'] != '') $questionaires[0]['Questionaire']['q8_service_id_3'] = str_pad($questionaires[0]['Questionaire']['q8_service_id_3'], 5, "0", STR_PAD_LEFT);

if($questionaires[0]['Questionaire']['q8_service_id_4'] != '') $questionaires[0]['Questionaire']['q8_service_id_4'] = str_pad($questionaires[0]['Questionaire']['q8_service_id_4'], 5, "0", STR_PAD_LEFT);

if($questionaires[0]['Questionaire']['q4_unit_type'] == 1){
    $questionaires[0]['Questionaire']['q4_unit_type'] ="খানা";
}elseif($questionaires[0]['Questionaire']['q4_unit_type'] == 2){
    $questionaires[0]['Questionaire']['q4_unit_type'] ="প্রতিষ্ঠান"; 
}

if($questionaires[0]['Questionaire']['q4_unit_org_type'] == 1){
    $questionaires[0]['Questionaire']['q4_unit_org_type'] ="স্থায়ী";
}elseif($questionaires[0]['Questionaire']['q4_unit_org_type'] == 2){
    $questionaires[0]['Questionaire']['q4_unit_org_type'] ="অস্থায়ী"; 
}


?>
<script>

function pagination(next_previous)
{
    var pathname = window.location.pathname;
    var path = pathname.split('/QuesChecks/details');
    var path_load = path[0];
    path = path[0] + "/Questionaires/getNextQues";
            
    $.ajax({
            url : path,
            type : "POST",
            dataType : 'json',
            data : {
                given_unit_no : $('#GivenUnitSerial').val(),
                book_id: $('#BookID').val(),
                ques_id: $('#QuesID').val(), 
                next_previous : next_previous
            },
            success : function(data) {
                if(data != null)
                window.location.href = path_load+"/QuesChecks/details/"+data;
            }
        });
}   

$(document).ready(function() {
    $('#goToPrevious').click(function(){
        pagination('previous');
    });
    $('#goToNext').click(function(){
        pagination('next');
    });
});
</script>

<br/>
<style>
    input[type=number]:focus{  background-color: #F6FCB3}
    
    div#pagingDiv
    {
        border: 1px solid black;
        width: 130px;
        height: 40px;
        padding: 10px 10px 10px 10px;
        text-align: center;
        font-weight: bold;
        font-size: 14px;
    }
</style>


<div class="questionaires form">
  
           <div id="pagingDiv" >
        Search<br />
        <button type="button" title="Previous" id="goToPrevious">&lArr;</button>
        <input type="hidden" id="BookID" value="<?=$questionaires[0]['Questionaire']['book_id']?>" />
        <input type="hidden" id="QuesID" value="<?=$questionaires[0]['Questionaire']['id']?>" />
        <input type="number" id="GivenUnitSerial" style="width: 50px; text-align: center;" maxlength="3" />
        <button type="button" title="Next" id="goToNext">&rArr;</button>
    </div>
      <br />
	<?php echo $this -> Form -> create(); ?>
	<fieldset>
		<legend>
			<?php echo __('বাংলাদেশ পরিসংখ্যান ব্যুরো'); ?>
		</legend>
		
<!-- 	FORM HEADING	 -->
         <div id="form_header">
             <label><span><b>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</b></span> </label><br />
             <label><span><b>অর্থনৈতিক শুমারি ২০১৩</b></span> </label>
            <hr>
              <label><span>সকল ইউনিটের জন্য পূরণ করুন</span> </label>
         </div>



<!--  BOOK INFO DASHBOARD	 -->
	<div id="info_board">
	    
	   
        <label for="bookcode"> বই নং: <?=$questionaires[0]['Questionaire']['book_id']?></label>

   
                    
       
       	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <label for="rmo"> RMO : </label>
   
                                        
       <?=$this -> Form -> input('rmo_code', array(
                                        'label' => false,
                                        'div' =>false,
                                        'readonly' => 'readonly', 
                                        'style' => 'width: 65px; text-align: center;',  
                                        'value' => $questionaires[0]['Questionaire']['rmo_code'],
                                        'type' => 'text'));?>
                                        
          <!-- &nbsp;&nbsp;&nbsp;<div id="showRMO"></div>    -->                      
          
                  
                         
 
	</div>
	
    
          
         <br /> <br />          
	
<?php include_once 'details/row_one.php'; ?>


	<!-- 	SEPARETOR	 -->
<div class="separetor">
    <br />
</div>




<?php include_once 'details/row_two.php'; ?>
	
	
	
	
<!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>


<?php include_once 'details/row_three.php'; ?>




<!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>


<?php include_once 'details/row_four.php'; ?>
	</fieldset>
</br>


<h2>Note:</h2>

<?php 
echo $this->Form->input('book_id', array('type' => 'hidden', 'label' => false, 'div' =>false, 'value' => $questionaires[0]['Questionaire']['book_id']));
echo $this->Form->input('error_note', array('type' => 'textarea', 'label' => false, 'div' =>false, 'cols' => 100, 'rows'=> 10, 'autofocus'=>true)); ?>

	<div class="modal"></div>
	<?php 
	$Addoptions = array
	(
	    'label' => 'Submit',
	    'value' => '',
	    'id' => 'saveQusID',
	    'div' => array(
	     'id' => 'saveQusID',
	    )
	);
echo $this -> Form -> end($Addoptions); 

echo $this->Html->script('comn_view_js/questionairees');
echo $this->Html->script('comn_view_js/func');
echo $this->Html->script('comn_view_js/edit_details');





?>
</div>
