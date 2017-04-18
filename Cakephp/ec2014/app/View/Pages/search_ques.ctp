
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
  
<div class="questionaires form"><br/>

<?php echo $this->Session->flash(); ?>


<!-- SEARCH FORM  -->
<div class="questionaires index">
    
    <fieldset>
        <legend><?php echo __('Search Questionnaire'); ?></legend>
    <?php 
    echo $this->Form->create(null, array('id' => 'search_ques_1','type' => 'post','url' => array('controller' => 'Pages', 'action' => 'search_ques') ));
    
    echo $this -> Form -> input('find_ques', array('label' => 'Questionnaire Number ', 'type' => 'text', 'style' => 'width: 250px;'));

    echo $this -> Form -> end(__('Search'));
        ?>
    </fieldset></br>
</div>







<!-- SEARCH RESULT AND EDIT FORM -->
<?php
if(!empty($questionaires)){
//pr($questionaires);


if($questionaires['Questionaire']['q7_product_id_1'] != '') $questionaires ['Questionaire']['q7_product_id_1'] = str_pad($questionaires ['Questionaire']['q7_product_id_1'], 5, "0", STR_PAD_LEFT);

if($questionaires['Questionaire']['q7_product_id_2'] != '') $questionaires ['Questionaire']['q7_product_id_2'] = str_pad($questionaires ['Questionaire']['q7_product_id_2'], 5, "0", STR_PAD_LEFT);


if($questionaires['Questionaire']['q7_product_id_3'] != '') $questionaires ['Questionaire']['q7_product_id_3'] = str_pad($questionaires ['Questionaire']['q7_product_id_3'], 5, "0", STR_PAD_LEFT);


if($questionaires['Questionaire']['q7_product_id_4'] != '') $questionaires ['Questionaire']['q7_product_id_4'] = str_pad($questionaires ['Questionaire']['q7_product_id_4'], 5, "0", STR_PAD_LEFT);


if($questionaires['Questionaire']['q8_service_id_1'] != '') $questionaires ['Questionaire']['q8_service_id_1'] = str_pad($questionaires ['Questionaire']['q8_service_id_1'], 5, "0", STR_PAD_LEFT);

if($questionaires['Questionaire']['q8_service_id_2'] != '') $questionaires ['Questionaire']['q8_service_id_2'] = str_pad($questionaires ['Questionaire']['q8_service_id_2'], 5, "0", STR_PAD_LEFT);

if($questionaires['Questionaire']['q8_service_id_3'] != '') $questionaires ['Questionaire']['q8_service_id_3'] = str_pad($questionaires ['Questionaire']['q8_service_id_3'], 5, "0", STR_PAD_LEFT);

if($questionaires['Questionaire']['q8_service_id_4'] != '') $questionaires ['Questionaire']['q8_service_id_4'] = str_pad($questionaires ['Questionaire']['q8_service_id_4'], 5, "0", STR_PAD_LEFT);

?>
<!-- *************************************************************************************  -->



<?php  
echo $this->Form->create(null, array('id' => 'search_ques_2', 'type' => 'post','url' => array('controller' => 'Pages', 'action' => 'search_ques') )); ?>

<fieldset>
<legend><?php echo __('বাংলাদেশ পরিসংখ্যান ব্যুরো'); ?></legend>
 
        
<!--    FORM HEADING     -->
<div id="form_header">
<label><span><b>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</b></span> </label><br />
<label><span><b>অর্থনৈতিক শুমারি ২০১৩</b></span> </label><hr>
 <label><span>সকল ইউনিটের জন্য পূরণ করুন</span> </label>
</div>

<?=$this -> Form -> input('ques_id', array(
                                            'readonly' => 'readonly', 
                                            'value' => $questionaires ['Questionaire']['id'],
                                            'type' => 'hidden'));?>

<!--  BOOK INFO DASHBOARD    -->
<div id="info_board">
<label for="bookcode"> বই নং: <?=$questionaires ['Questionaire']['book_id']?></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="rmo"> RMO : </label>
<?=$this -> Form -> input('rmo_code', array('label' => false,
                                            'div' =>false,
                                            'readonly' => 'readonly', 
                                            'style' => 'width: 65px; text-align: center;',  
                                            'value' => $questionaires ['Questionaire']['rmo_code'],
                                            'type' => 'text'));?>
</div><br /><br />

<!--    SEPARETOR    -->    
<?php include_once 'search_ques/row_one.php'; ?>


<!--    SEPARETOR    -->
<div class="separetor"><br /></div>
<?php include_once 'search_ques/row_two.php'; ?>
    
 
<!--    SEPARETOR    -->
<div class="separetor"><br /></div>
<?php include_once 'search_ques/row_three.php'; ?>


<!--    SEPARETOR    -->
<div class="separetor"><br /></div>
<?php include_once 'search_ques/row_four.php'; ?>

</fieldset>
</br>

<?php 
$Addoptions = array('label' => 'Update','value' => '','id'    => 'saveQusID','div'   => array('id'   => 'saveQusID'));   

echo $this -> Form -> end($Addoptions); 
?>

<?php
echo $this->Html->script('search_ques/questionairees');
echo $this->Html->script('search_ques/func');
echo $this->Html->script('search_ques/edit_details');
echo $this->Html->script('search_ques/form_submit_validation');
?>

</div>

<?php } ?>



