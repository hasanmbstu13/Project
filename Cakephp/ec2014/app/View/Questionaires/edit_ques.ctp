<?php echo $this->Session->flash(); ?>

<script>

function pagination(next_previous)
{
	var pathname = window.location.pathname;
	var path = pathname.split('/edit_ques');
	var path_load = path[0];
	path = path[0] + "/getNextQues";
			
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
				window.location.href = path_load+"/edit_ques/"+data;
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
    	height: 55px;
    	padding: 10px 10px 10px 10px;
    	text-align: center;
    	font-weight: bold;
    	font-size: 14px;
    }
</style>


<?php
if (isset($_SESSION["q1_geo_code_mauza_id"]))
    $muza_id = $_SESSION["q1_geo_code_mauza_id"];
else
    $muza_id = "";

if (isset($_SESSION["q1_geo_code_mauza_name"]))
    $muza_name = $_SESSION["q1_geo_code_mauza_name"];
else
    $muza_name = "";
?>



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
	
	
    <?php echo $this -> Form -> create('Questionaire'); ?>
    <fieldset>
        <legend>
            <?php echo __('বাংলাদেশ পরিসংখ্যান ব্যুরো'); ?>
        </legend>
        
<!--    FORM HEADING     -->
         <div id="form_header">
             <label><span><b>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</b></span> </label><br />
             <label><span><b>অর্থনৈতিক শুমারি ২০১৩</b></span> </label>
            <hr>
              <label><span>সকল ইউনিটের জন্য পূরণ করুন</span> </label>
         </div>



<!--  BOOK INFO DASHBOARD    -->
    <div id="info_board">
        
       
        <label for="bookcode"> বই নং: <?=$questionaires[0]['Questionaire']['book_id']?></label>
                    <?php echo $this -> Form -> input('book_id', array(
                                               'label' => FALSE, 
                                               'type'=>'hidden',
                                              // 'value'=> $_SESSION["bookID"]
                                               'value' => $questionaires[0]['Questionaire']['book_id'],
                                               )); ?>
                                               
 <?=$this -> Form -> input('rmo_code2', array(
                                        'label' => false,
                                         'style' => 'width: 65px; text-align: center;', 
                                        'div' =>false,
                                        'value' => $questionaires[0]['Questionaire']['rmo_code'],
                                         'type' => 'hidden'
                                        ));?>
                                        
                                        
        
            <?php 
             if($questionaires[0]['Book']['growth_centre'] == 1):?> 
                            
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <label for="rmo"> RMO : </label>
       
                                        
       <?=$this -> Form -> input('rmo_code', array(
                                        'label' => false,
                                        'div' =>false,
                                        'value' => $questionaires[0]['Questionaire']['rmo_code'],
                                        'style' => 'width: 65px; text-align: center;', 
                                        'maxlength' => 1, 
                                        'minlength' => 1, 
                                        'autofocus' => 'autofocus',
                                        'type' => 'text'));?>
                                        
           &nbsp;&nbsp;&nbsp;<div id="showRMO"></div>                          
          <?php endif; ?> 
                  
                         
 
    </div>
    
    
          
         <br /> <br />          
    
<?php include_once 'edit_ques/row_one.php'; ?>




    <!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>




<?php include_once 'edit_ques/row_two.php'; ?>
    
    
    
    
<!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>


<?php include_once 'edit_ques/row_three.php'; ?>




<!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>


<?php include_once 'edit_ques/row_four.php'; ?>


    </fieldset>
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

echo $this->Html->script('edit_ques/questionairees');
echo $this->Html->script('edit_ques/func');
echo $this->Html->script('edit_ques/autofocus_validation');
echo $this->Html->script('edit_ques/tab_validation');
echo $this->Html->script('edit_ques/mouse_validation');
echo $this->Html->script('edit_ques/form_submit_validation');
echo $this->Html->script('edit_ques/edit_details');
?>
</div>
