
<?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Book'); ?>

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
  

<div class="book form"><br/>


<?php echo $this->Session->flash(); ?>


<!-- SEARCH FORM  -->
<div class="book index">
    
    <fieldset>
        <legend><?php echo __('Search Book'); ?></legend>
    <?php 
    echo $this->Form->create(null, array('id' => 'search_ques_1','type' => 'post','url' => array('controller' => 'Pages', 'action' => 'search_book') ));
    
    echo $this -> Form -> input('find_book', array('label' => 'Book Number ', 'type' => 'text', 'style' => 'width: 250px;'));

    echo $this -> Form -> end(__('Search'));
        ?>
    </fieldset></br>
</div>


<h2>প্রশ্নপত্রের তালিকা</h2>
<p> Total Unit: <?php  echo $total; ?> </p> 

<table cellpadding="0" cellspacing="0" border="1">
    <tr>
            <th>Book ID</th>
            <th>Muza Name</th> 
            <th>Unit Serial No</th>
            <th>Unit Name</th>
            <th>Village/Moholla</th>
            <th>Entry By</th>
            <th>Actions</th>
    </tr>

<?php
    foreach ($questionaires as $questionaire): ?>
    <tr>

        <td><?php echo h($questionaire['Report']['book_id']); ?>&nbsp;</td>
        <td><?php echo h($questionaire['Report']['q1_geo_code_mauza_name']); ?>&nbsp;</td>
        <td><?php echo h($questionaire['Report']['q1_unit_serial_no']); ?>&nbsp;</td>
        <td><?php echo h($questionaire['Report']['q2_unit_name']); ?>&nbsp;</td>
        <td><?php echo h($questionaire['Report']['q2_village_maholla']); ?>&nbsp;</td>
         <td><?php echo h($questionaire['Report']['ques_entry_by_name']); ?>&nbsp;</td>
       <td ><?php echo $this->Html->link(__('Details'), array('controller' =>'Questionaires',  'action' => 'details_view', $questionaire['Report']['questionnarie_id']),array('style' => 'color:black'));  ?></td>
    </tr>
    
    
<?php endforeach; ?>






    </table>
