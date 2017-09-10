<?php $this->assign('title', 'PB'); ?>
<?php echo $this->Html->css($path . 'css/email/style.css'); ?>
<?php echo $this->Html->css($path . 'css/email/bootstrap.min.css'); ?>

<div class="main" align="center">
    <img src="<?php echo $path; ?>img/email/BG_2.png">
    <h2>Hi <?php echo $owner_name; ?></h2>
    <P>We are so glad that you said yes. "<?php echo $restaurant_name; ?>" is now on PIKDISH.</P>
    <a class="icon" href="#"><img src="<?php echo $path; ?>img/email/tweeterbutton.png"></a>
    <a class="icon" href="#"><img src="<?php echo $path; ?>img/email/facebookbutton.png"></a>
    <a class="icon" href="#"><img src="<?php echo $path; ?>img/email/emailbutton.png"></a>
</div>
