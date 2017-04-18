
<?php echo $this->Session->flash(); ?>
<div class="unitHeadEconomies index">
    <h2><?php echo __('ঊর্ধতন কর্তৃপক্ষ কর্তৃক নির্দেশনা তালিকা'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th>বই নং</th>
            <th>মৌজার নাম</th>
         	<th>ইউনিটের ক্রমিক নং</th> 
            <th>নির্দেশনা</th>
            <th>Out Of Scope</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php
    foreach ($error_data as $data_check): ?>
    <tr> 
        <td><?php echo h($data_check['Questionaire']['book_id']); ?>&nbsp;</td>
         <td><?php echo h($data_check['Questionaire']['q1_geo_code_mauza_name']); ?>&nbsp;</td>
          <td><?php echo h($data_check['Questionaire']['q1_unit_serial_no']); ?>&nbsp;</td>
        <td><?php echo h($data_check['QuesCheck']['error_note']); ?>&nbsp;</td>
        <td><?php if($data_check['Questionaire']['is_out_of_scope'] == 1) echo "<b style='color: red;'>YES</b>"; else echo "NO"; ?>&nbsp;</td>     
        <td class="actions">
            <?php echo $this->Html->link(__('Details'), array('action' =>'edit_details', $data_check['QuesCheck']['questionaire_id'])); ?> 

        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>  </p>

    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
