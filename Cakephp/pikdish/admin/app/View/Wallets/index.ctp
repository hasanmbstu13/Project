<?php 

 $this->assign('title', 'Wallets');

 echo $this->Html->script($path.'js/lightbox/js/lightbox.min.js');

 echo $this->Html->css($path.'js/lightbox/css/lightbox.min.css');

?>

<style>

.right_col

{

	padding-right:10px  !important;

	padding-left:10px  !important;

}



 .x_panel

 {

	 padding:0px 0px !important;

	 border-radius:3px ;

	 

	 

 }

 .sidebar-footer

 {

	 padding-top:25px !important

 }

</style>

<div class="right_col" role="main">



<div class="x_panel" style="min-height: 500px;">
<div style="padding: 15px;">

    <h3>Wallet</h3>
    <p>
        Wallet Amount: $sign$ <?= 123 ?>
        <button class="btn btn-success btn-sm" style="margin-left: 20px;">Transer Cash</button>
        <span class="pull-right">Today Collection: $sign$ <?= 222 ?></span>
    </p>
    
</div>
 <div class="table-responsive">

 <table id="list"></table>	 

 </div>	 

</div>

  
	<? echo ($this->Js->writeBuffer());?>