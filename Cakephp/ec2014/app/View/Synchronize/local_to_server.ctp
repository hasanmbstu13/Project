<?php if($booksMsg == "" && $quesMsg == "" &&  $quesCheck == ""){
?>
<div class="alerto alert-danger ">
	<h2>All Data are up-to-date.</h2>
</div>
<?php } else { ?>
<div class="alerto alert-danger ">
	<b>Synchronization process started. It may take several minutes. Please wait...</b>
</div>
<?php } ?>


<?php if($booksMsg != ""): ?>
<div class="alerto alert-info">
	<h2>Phase One</h2>
	<p><?=$booksMsg?></p>
</div>
<?php endif; ?>



<?php if($quesMsg != ""): ?>
<div class="alerto alert-info">
	<h2>Phase Two</h2>
	<p><?=$quesMsg?></p>
</div>
<?php endif; ?>


<?php if($quesCheck != ""): ?>
<div class="alerto alert-info">
	<h2>Phase Three</h2>
	<p><?=$quesCheck?></p>
</div>
<?php endif; ?>

<div class="alerto alert-success">
	<h2>Synchronize process has been completed successfully...</h2>
</div>

