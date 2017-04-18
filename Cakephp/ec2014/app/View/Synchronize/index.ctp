<style>
  .master_tbl{
 height: 500 px;
 width: 600 px;
 margin-top:20 px;
 padding:12px;   
 } 
</style>
<?php echo $this->Session->flash(); 
if($localToServer == 0) $send = 'সার্ভারে তথ্য পাঠান  (All Data are up-to-date.)';
else $send = 'সার্ভারে তথ্য পাঠান  ('.$localToServer.' - টি Data  পাঠানো বাকি আছে)';

if($serverToLocal == 0) $fetch = 'সার্ভার থেকে তথ্য আনুন  (All Data are up-to-date.)';
else $fetch = 'সার্ভার থেকে তথ্য আনুন ('.$serverToLocal.' - টি Data আনা বাকি আছে)';


?>
               <fieldset>
                <legend>সার্ভারে&nbsp;তথ্য&nbsp;আদান&nbsp;-&nbsp;প্রদান</legend>
          <div class="master_tbl">
                <ul class="list_with_icon">
                    <li><?php echo $this->Html->link($send, array('controller' => 'Synchronize', 'action' => 'localToServer'));?></li>
                    
                    
                    <li><?php echo $this->Html->link($fetch, array('controller' => 'Synchronize', 'action' => 'serverToLocal'));?></li>
                   
                </ul>
             </div>
            </fieldset>
            
            <br /><br />


