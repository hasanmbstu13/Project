<style>
    .active {

        background: none repeat scroll 0 0 #FFFFF;
        border: 1px;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.8) inset;
        height: 22px;
        width: 125px;
    }
</style>

<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
    <?php echo $this -> Html -> link(__('BACK TO BOOKS'), array('controller' => 'QuesChecks', 'action' => 'books', $book['geo_code_union_id'], $book['geo_code_upazila_id'])); ?>
</div>
<br />

<div class="geoCodeRmos index">
    <h2><?php echo __('সংশোধনী বই নং: ' . $id); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo 'Unit Number'; ?></th>
            <th><?php echo 'Unit Name'; ?></th>
            <th><?php echo 'Unit Type'; ?></th>
            <th><?php echo 'Economic Code'; ?></th>
            <th><?php echo 'Indrustrial Code'; ?></th>
            <th><?php echo 'View Details'; ?></th>
        </tr>

        <?php $states = array('' => '', '0'=> 'Yes','1' => 'No')
        ?>

        <?php

echo $this->Form->create();

/* null, array(
'url' => array('controller' => 'QuesSixChecks', 'action' => 'saveques')
)); */

$i = 0;

foreach ($questionaires as $questionaire): ++$i;
        ?>

        <?php $chk;

        if ($questionaire['Questionaire']['q4_unit_type'] == 1) {

            $chk = "Khana";
        } else if ($questionaire['Questionaire']['q4_unit_type'] == 2) {
            $chk = "Organization";
        }
        ?>

        <tr>

            <td><?php echo h($questionaire['Questionaire']['q1_unit_serial_no']); ?>&nbsp;</td>

            <td><?php echo h($questionaire['Questionaire']['q2_unit_name']); ?>&nbsp;</td>

            <td><?php echo h($chk); ?>&nbsp;</td>

            <td><?php echo h($questionaire['Questionaire']['q5_unit_head_economy_id']); ?>&nbsp;</td>

            <td><?php echo h($questionaire['Questionaire']['q6_ind_code_class_id']);
            ?>&nbsp;</td>

            <td><?php echo $this->html->link('Details', array('controller' => 'QuesChecks', 'action' => 'details', $questionaire['Questionaire']['id']))
            ?></td>
        </tr>
        <?php endforeach;
        ?>
    </table>

</div>
