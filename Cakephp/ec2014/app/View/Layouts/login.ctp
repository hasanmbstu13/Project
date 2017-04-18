<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
<?=$this->Html->meta('icon', $this->Html->url('/img/fevicon_bbs.png'))?>
<?=$this->Html->css('login_style')?>
<?=$this->Html->script('jquery-1.8.3.min')?>

<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
    $(".username").focus(function() {
        $(".user-icon").css("left","-48px");
    });
    $(".username").blur(function() {
        $(".user-icon").css("left","0px");
    });
    
    $(".password").focus(function() {
        $(".pass-icon").css("left","-48px");
    });
    $(".password").blur(function() {
        $(".pass-icon").css("left","0px");
    });
});
</script>

</head>
<body>


<div id="wrapper">

<?=$this->fetch('content')?>

</div>


<div class="gradient"></div>

</body>
</html>
