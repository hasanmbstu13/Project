
<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
    	
        <div class="section_w368">
        	<div class="header_04">Privacy Policy</div>
        	<p>BBS may update this Privacy Policy from time to time without notice to you. If this Privacy Policy is updated, your continued use of this Website or the Services will be deemed your conclusive acceptance of the most recent version of this Privacy Policy.</p>
            
            <div class="margin_bottom_10"></div>
            
            
        </div>

        <div class="section_w184">
        	<div class="header_04">Services</div>
        	<ul class="footer_menu_list">
                <li><?php echo $this->Html->link('Admin Panel',array('plugin'=>'authake','controller' => 'Authake', 'action' => 'index')); ?></li>

                <li><?php echo $this->Html->link('Login',array('plugin'=>'authake','controller' => 'User', 'action' => 'login')); ?></li>

                <li><?php echo $this->Html->link('Change Password',array('controller' => 'passwords', 'action' => 'change')); ?></li>
                           
            </ul>
        </div>
        
        <div class="section_w184">
			<div class="header_04">Important Links</div>        
        	<ul class="footer_menu_list">
                <li> <?php echo $this->Html->link('Home', array('controller' => 'Pages', 'action' => 'index')) ?></li> 
                <li><?php echo $this->Html->link('Questionaries', array('controller'=>'Questionaires', 'action' => 'add')) ?></li>
                <li><?php echo $this->Html->link('Synchronize', array('controller' => 'Synchronize', 'action'=> 'index') ); ?></li>    
                  
            </ul>
        </div>
        
           <div class="section_w184">
            <div class="header_04">Contact Us</div>        
            <ul class="footer_menu_list">
                <li> Phone: +88028129150</li> 
                <li>Email: alamgir.so@bbs.gov.bd</li>    
            </ul>
        </div>
        
        <div class="margin_bottom_20"></div>
        
        <div class="section_w920">
        Copyright © 2013 <a href="http://www.bbs.gov.bd" target="_blank">BBS | Bangladesh Bureau of Statistics</a> | Powered by <a href="http://www.genesys-corp.com" target="_blank">Genesis Systems Ltd.</a>
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer -->