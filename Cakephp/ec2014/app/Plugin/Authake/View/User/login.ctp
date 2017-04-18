    <div class="user-icon"></div>
    <div class="pass-icon"></div>



<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'login'), 'class' => array('class' => 'login-form')));?>


    <div class="header">
    <h1>Login Here</h1>
    <span>
    	<?php
        $f_msg = $this->Session->flash();
            //if($f_msg == "")
           // {
                echo "Please fill out the form below to to access your account.";
           // }
           // else
           // {
               // echo $f_msg;
           // }

        ?> 
    </span>
    </div>
    

    <div class="content">
<?php 
	echo $this->Form->input('login', array('label'=>'', 'class' => 'input username', 'placeholder' => 'Username', 'div' => FALSE, 'label' => FALSE, 'required'=>'' ));
	echo $this->Form->input('password', array('label'=>'', 'value' => '',  'class' => 'input password', 'placeholder' => 'Password', 'div' => FALSE , 'label' => FALSE, 'required'=>''  ));
?>

<span style="color: red; font-size: 11px; text-shadow: 1px 1px 0 #FFFFFF; line-height: 16px; padding-left: 30px;">
<?=$f_msg?>
</<span>
    </div>
    
    <!--FOOTER-->
    <div class="footer">

        <?php echo $this->Html->Link('Home', array(
'plugin'=>'',
'controller'=>'pages',
'action'=>'index'), array('class' => 'button', 'style' => 'hight: 10px; width:47px; float: left;text-decoration: none; '));?> 
         

<?php echo $this->Form->end(array('div'=>false,'label'=>'Login','class'=>'button'));?>

  <!--  <input type="submit" name="submit" value="Login" class="button" />-->
    
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->