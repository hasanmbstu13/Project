		<?php echo $this->Session->flash(); ?>
		<!--<div class="header_01">Welcome to Bangladesh Bureau of Statistics (BBS)</div>-->
		
<?php if(!$this->Session->check('Authake.group_ids')): ?>		
<div> <h2>আপনি কোথায় ডাটা এন্ট্রি করতে চান?</h2></div>
		   <div class="section_01">
                                    
                <ul class="list_with_icon">
                      <li>
                          
                         <a href="https://www.google.com.bd/" target="_blank">সেন্ট্রাল সার্ভারে অনলাইনে</a>  
                          
                        <!--   <?php echo $this->Html->link ('সেন্ট্রাল সার্ভারে', array('url'=>'https://www.google.com.bd/')) ?> --></li>    
                <li><?php echo  $this->Html->link ('লোকাল পিসিতে অফলাইনে', array('plugin'=>'authake','controller' => 'User', 'action' => 'login')) ?></li>   
    
    </ul>
                                                   
                                </div>
                                
   <?php endif; ?>
		<p>
		    <?php echo $this->Html->image('/img/header2.jpg', array('width' => '100%'))?>
		     
		</p>
		<p style="margin: 0 px">
			<?php echo $this->Html->image('/img/footer.png', array('width' => '100%'))?>
		</p>
                <!--
                <p>The Bangladesh Bureau of Statistics (BBS) is the centralized official bureau in Bangladesh for collecting statistics on demographics, the economy, and other facts about the country and disseminating the information.</p>
                                
                          <div class="section_01">
                                    <div class="top"></div>
                                    <p>Although independent statistical programs had existed in the country before, they were often incomplete or produced inaccurate results, which led the Government of Bangladesh establishing an official bureau in August 1974, by merging four of the previous larger statistical agencies, the Bureau of Statistics, the Bureau of Agriculture Statistics, the Agriculture Census Commission and the Population Census Commission.</p>    
                                    
                                    <div class="bottom"></div>                
                                </div>
                                
                                <p>In July 1975, the Statistics Division was created and placed under the Ministry of Planning in order to control it administratively In 2002, the Statistics Division merged with Planning Commission and the burea is now controlled by the Ministry of Planning and office.</p>
                                
                                <ul class="list_with_icon">
                                    <li>With its headquarters in Dhaka, the Bangladesh Bureau of Statistics, as of 2008, has 23 regional statistical offices and 489 Upazilla/Thana offices located in the 23 districts of Bangladesh.</li>
                
                              </ul>
                              -->
                

















