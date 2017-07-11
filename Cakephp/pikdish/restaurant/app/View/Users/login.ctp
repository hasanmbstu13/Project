<?php
    $this->assign('title', "Login | Picdish");
?>
<div id="login" class="animate form">
                <section class="login_content">
                    <?php echo $this->Form->create('User'); ?>
                        <h1>Login Form</h1>
                        <div>
                   
							<?php echo $this->Form->input('User.username', array('required'=>'true','type'=>'email','class' => 'form-control', 'label' => false, 'div' => false,'placeholder'=>'Username','autofocus'=>true,"autocomplete"=>"false"));?>
                        </div>
                        <div>
						<?php echo $this->Form->input('User.password', array('required'=>'true','placeholder'=>'Password','class' => 'form-control', 'label' => false, 'div' => false,"autocomplete"=>"false"));?>
                          
                        </div>
                        <div>
                             <?php echo $this->Form->end(array(
								    'label' => 'Sign In',
								    'id' => 'btnLogin',
								    'class' => 'btn btn-default submit',
								    'div' => false 
								    )); 

									
								?>
                            <!--<a class="reset_pass" href="#">Lost your password?</a>-->
                        </div>
                        <div class="clearfix"></div>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>