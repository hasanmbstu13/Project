<style>
	a.redStatus {
		color: red;
	}
</style>

<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('BACK TO UNION / WARD'), array('controller' => 'QuesSixChecks', 'action' => 'sounions', $secBooks['GeoCodeUpazila']['id'])); ?>
</div>
<br />

<div class="actions">
	<fieldset>
		<legend>
			বইয়ের  তালিকা
		</legend>

		<?php

foreach ($books as $key => $book) {

echo ($key+1).". ".$this->Html->link($book['Book']['id']." (".$book['Book']['status'].")", array('controller' => 'QuesSixChecks', 'action' => 'soquestions', $book['Book']['id']), array('class' => $book['Book']['status'] == "Pending"?'redStatus':""));
echo "<br />";
}

		?>
	</fieldset>
	<br/>
</div>