<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
	<?php 
		echo "BBS - ECONOMIC CENSUS 2013"; 
	?>
</title>
<?php
echo $this->Html->meta('icon', $this->Html->url('/img/fevicon_bbs.png'));
//echo $this->Html->css('ui/jquery.ui.all');
echo $this->Html->css('style_table');
echo $this->Html->script('jquery-1.8.3.min');

/*
echo $this->Html->script('ui/jquery.ui.core');
echo $this->Html->script('ui/jquery.ui.widget');

echo $this->Html->script('ui/jquery.ui.mouse');
echo $this->Html->script('ui/jquery.ui.draggable');
echo $this->Html->script('ui/jquery.ui.position');
echo $this->Html->script('ui/jquery.ui.resizable');
echo $this->Html->script('ui/jquery.ui.button');
echo $this->Html->script('ui/jquery.ui.dialog');*/


?>
</head>

<body>

<?=$this->element('header')?>

<?php
if($this->Session->check('Authake.group_ids'))
{
	if(in_array(1, $this->Session->read('Authake.group_ids'))) // ADMIN
	{
		echo $this->element('menu');
	}
	else if(in_array(2, $this->Session->read('Authake.group_ids'))) // Operator
	{
		echo $this->element('op_menu');
	}
	else if(in_array(3, $this->Session->read('Authake.group_ids'))) // Supervisor
	{
		echo $this->element('sup_menu');
	}
	else if(in_array(4, $this->Session->read('Authake.group_ids'))) // Supervising Officer
	{
		echo $this->element('so_menu');
	}
	else if(in_array(5, $this->Session->read('Authake.group_ids'))) // Division Coordinator
	{
		echo $this->element('so_menu');
	}
	else if(in_array(7, $this->Session->read('Authake.group_ids'))) // Division Coordinator
    {
        echo $this->element('admin_viewer_menu');
    }
	else 
	{
		echo $this->element('home_menu');
	}
}
else 
{
	echo $this->element('home_menu');
}
?>



<div id="tempatemo_content_wrapper">

    <div id="templatemo_content">
    
    	
        
        <div id="content_panel">
        	
            <div id="column_w610">
            

            <?=$this->fetch('content')?>
            	
            
            </div> <!-- end of column w610 -->
            
            
            
            <div class="cleaner"></div>
            
        </div> <!-- end of content panel -->
        
        <div class="cleaner"></div>
    </div> <!-- end of content -->
    
</div> <!-- end of content wrapper -->




<?=$this->element('footer')?>




</body>

</html>