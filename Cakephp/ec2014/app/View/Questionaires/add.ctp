<?php echo $this->Session->flash(); 

if(isset($_SESSION['q_error']))
{
	$br = array("<br />", "<br>");
	$_SESSION['q_error'] = str_replace($br, " ", $_SESSION['q_error']);
	echo '<script>alert("'.$_SESSION['q_error'].'");</script>';
	unset($_SESSION['q_error']);
}

?>
<br/>

<style>
	input[type=number]:focus{  background-color: #F6FCB3}
	
	div#invalidCode {
		color: red;
		font-weight:bold;
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
<div id="ques_menu">
    
  <div id="new_question">
<a href="#">নতুন প্রশ্নপত্র</a>
</div>

<div id="new_book">
<?php echo $this->Html->link(__('নতুন বই'), array(
'controller' => 'Books',
'action' => 'add')); ?>
</div>

<div id="book_edit">
            <?php echo $this->Html->link(__('শুমারি বই পরিচিতি পাতা'), array(
            'controller' => 'Books','action' => 'edit', $_SESSION["bookID"],  'div'=>FALSE)); ?>
</div>
  
    
</div>

</br>
</br>
<div class="questionaires form">
	<?php echo $this -> Form -> create('Questionaire'); ?>
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
	    
	   
        <label for="bookcode"> বই নং: <?=$_SESSION["bookID"]?></label>
                    <?php echo $this -> Form -> input('book_id', array(
                                               'label' => FALSE, 'type'=>'hidden',
                                               'value'=> $_SESSION["bookID"])); ?>
        
    <?=$this -> Form -> input('rmo_code2', array(
                                        'label' => false,
                                        'div' =>false,
                                        'value' => $books['GeoCodeRmo']['rmo_code'],
                                        'type' => 'hidden'));?>
    
             <?php 
             if($books['Book']['growth_centre'] == 1):?>
							
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <label for="rmo"> RMO : </label>
       
                                        
       <?=$this -> Form -> input('rmo_code', array(
                                        'label' => false,
                                        'div' =>false,
                                        'style' => 'width: 65px; text-align: center;', 
                                        'maxlength' => 1, 
                                        'minlength' => 1, 
                                        'autofocus' => 'autofocus',
                                        'type' => 'text'));?>
                                        
           &nbsp;&nbsp;&nbsp;<div id="showRMO"></div>                          
           <?php endif; ?>
                  
                         
 
	</div>
	
    
          
         <br /> <br />          
	
<?php include_once 'add/row_one.php'; ?>




	<!-- 	SEPARETOR	 -->
<div class="separetor">
    <br />
</div>




<?php include_once 'add/row_two.php'; ?>
	
	
	
	
<!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>


<?php include_once 'add/row_three.php'; ?>




<!--    SEPARETOR    -->
<div class="separetor">
    <br />
</div>


<?php include_once 'add/row_four.php'; ?>


	</fieldset>
	<div class="modal"></div>
	<?php 
	$Addoptions = array
	(
	    'label' => 'Submit',
	    'value' => '',
	    'id' => 'saveQusID',
	    'div' => array( 
	       
	    )
	);
echo $this -> Form -> end($Addoptions); 

echo $this->Html->script('questionaries/questionairees');
echo $this->Html->script('questionaries/func');
echo $this->Html->script('questionaries/autofocus_validation');
echo $this->Html->script('questionaries/tab_validation');
echo $this->Html->script('questionaries/mouse_validation');
echo $this->Html->script('questionaries/form_submit_validation');
?>
</div>
