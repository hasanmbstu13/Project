<?php echo $this->Session->flash(); ?>


<?php if(in_array(1, $this->Session->read('Authake.group_ids')) || in_array(7, $this->Session->read('Authake.group_ids'))): ?> <!-- ADMIN -->
	<fieldset>
                <legend>Admin</legend><br>
          <div class="master_tbl">
                <ul class="list_with_icon">
                     <li><?php echo $this->Html->link('Data Entry Status', array('controller' =>'Dashboard', 'action' => 'index'));?></li>
                </ul>
             </div>
            </fieldset>
            <br />
<?php endif; ?>


<!-- OPERATOR -->
<?php if(in_array(2, $this->Session->read('Authake.group_ids'))): ?> 
	<fieldset>
                <legend>Data Entry Operator</legend><br>
          <div class="master_tbl">
                <ul class="list_with_icon">
                     <li><?php echo $this->Html->link('ঊর্ধতন কর্তৃপক্ষ কর্তৃক নির্দেশনা তালিকা', array('controller' =>'QuesChecks', 'action' => 'op_ques_check'));?></li>
                     
                     <li><?php echo $this->Html->link('ধারণকৃত  প্রশ্নপত্রের তালিকা (দেখা /সংশোধন করা)', array('controller' =>'Questionaires', 'action' => 'index'));?></li>
                     
                     <li><?php echo $this->Html->link('Data Entry Status', array('controller' =>'Dashboard', 'action' => 'index'));?></li> 
 

                </ul>
             </div>
            </fieldset>
            <br />
<?php endif; ?>




<!-- SUPERVISOR -->
<?php if(in_array(3, $this->Session->read('Authake.group_ids'))): ?> 
	<fieldset>
                <legend>Supervisor</legend><br>
          <div class="master_tbl">
                <ul class="list_with_icon">
                	 <li><?php echo $this->Html->link('সকল প্রশ্নপত্রের নিরীক্ষণ', array('controller' => 'QuesChecks', 'action' => 'qall_upazila'));?></li>
                	 
                    <li><?php echo $this->Html->link('৬ নং প্রশ্নের নিরীক্ষণ', array('controller' =>'QuesSixChecks', 'action' => 'q6upazila'));?></li>
       
                    <li><?php echo $this->Html->link('৬ নং প্রশ্নের সংশোধনী', array('controller' =>'QuesSixChecks', 'action' => 'soupazila'));?></li>
 
  <!-- Out Of Scope  -->  
                 <li><?php echo $this->Html->link('এন্ট্রিকৃত (Out Of Scope) প্রশ্নপত্রের নিরীক্ষণ', array('controller' => 'QuesChecks', 'action' => 'qall_upazila_outscope'));?></li>
                    
                    
                    <li><?php echo $this->Html->link('Data Entry Status', array('controller' =>'Dashboard', 'action' => 'index'));?></li>
                    
                     <li><?php echo $this->Html->link('Monitoring & Supervision', array('controller' =>'Dashboard', 'action' => 'sup_dashboard'));?></li>

                </ul>
             </div>
            </fieldset>
            <br>

<?php endif; ?>





<!-- Supervising Officer -->
<?php if(in_array(4, $this->Session->read('Authake.group_ids'))): ?> 
	<fieldset>
                <legend>Supervising Officer</legend><br>
          <div class="master_tbl">
                <ul class="list_with_icon">
                	<li><?php echo $this->Html->link('সকল প্রশ্নপত্রের নিরীক্ষণ', array('controller' => 'QuesChecks', 'action' => 'qall_upazila'));?></li>  
                	
                	<li><?php echo $this->Html->link('৬ নং প্রশ্নের নিরীক্ষণ', array('controller' =>'QuesSixChecks', 'action' => 'q6upazila'));?></li>
                	             	
                     <li><?php echo $this->Html->link('৬ নং প্রশ্নের সংশোধনী', array('controller' =>'QuesSixChecks', 'action' => 'soupazila'));?></li>             
                     <li><?php echo $this->Html->link('৬ নং প্রশ্নের সংশোধনী অনুমোদন', array('controller' =>'QuesSixChecks', 'action' => 'approval_upazila'));?></li>
                     
                     
                     
 <!--    Out Of Scope  -->
 <li><?php echo $this->Html->link('এন্ট্রিকৃত (Out Of Scope) প্রশ্নপত্রের নিরীক্ষণ', array('controller' => 'QuesChecks', 'action' => 'qall_upazila_outscope'));?></li>
 
 
                       
                     <li><?php echo $this->Html->link('Data Entry Status', array('controller' =>'Dashboard', 'action' => 'index'));?></li> 
                     
                     <li><?php echo $this->Html->link('Monitoring & Supervision', array('controller' =>'Dashboard', 'action' => 'so_dashboard'));?></li>
                 
                </ul>
             </div>
            </fieldset>
            <br />
<?php endif; ?>




<!-- Division Coordinator -->
<?php if(in_array(5, $this->Session->read('Authake.group_ids'))): ?> 
	<fieldset>
                <legend>Divisional Coordinator</legend><br>
          <div class="master_tbl">
                <ul class="list_with_icon">
                	<li><?php echo $this->Html->link('৬ নং প্রশ্নের নিরীক্ষণ', array('controller' =>'QuesSixChecks', 'action' => 'q6upazila'));?></li>
                	<li><?php echo $this->Html->link('সকল প্রশ্নপত্রের নিরীক্ষণ', array('controller' => 'QuesChecks', 'action' => 'qall_upazila'));?></li>
                     <li><?php echo $this->Html->link('৬ নং প্রশ্নের সংশোধনী', array('controller' =>'QuesSixChecks', 'action' => 'soupazila'));?></li>             
                     <li><?php echo $this->Html->link('৬ নং প্রশ্নের সংশোধনী অনুমোদন', array('controller' =>'QuesSixChecks', 'action' => 'approval_upazila'));?></li>
                     
<li><?php echo $this->Html->link('এন্ট্রিকৃত (Out Of Scope) প্রশ্নপত্রের নিরীক্ষণ', array('controller' => 'QuesChecks', 'action' => 'qall_upazila_outscope'));?></li>

 
                   
                     <li><?php echo $this->Html->link('Data Entry Status (At a Glance)', array('controller' =>'Dashboard', 'action' => 'index'));?></li>
                     <li><?php echo $this->Html->link('Data Entry Status (In Detail)', array('controller' =>'DivnCoo', 'action' => 'index'));?></li>
                </ul>
             </div>
            </fieldset>
            <br />
<?php endif; ?>


             

             
            
            
             
            