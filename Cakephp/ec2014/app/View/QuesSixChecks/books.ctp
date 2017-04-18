<style>
	a.redStatus {
		color: red;
	}
</style>
<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('BACK TO UNION / WARD'), array('controller' => 'QuesSixChecks', 'action' => 'unitname', $upazilaID)); ?>
</div>
<br />

<div class="actions">
	<fieldset>
		<legend>
			বই&nbsp;এর&nbsp;তালিকা
		</legend>

		<?php

foreach ($books as $key => $book) {

echo ($key+1).". ".$this->Html->link($book['Book']['id']." (".$book['Book']['status'].")", array('controller' => 'QuesSixChecks', 'action' => 'questions', $book['Book']['id']), array('class' => $book['Book']['status'] == "Pending"?'redStatus':""));
echo "<br />";
}

		?>
	</fieldset>

	<br />
	<br />

	<fieldset>
		<legend>
			Print Books
		</legend>

		<?php

foreach ($books as $key => $book) {
if($book['Book']['status'] == "Checked")
{
echo ($key+1).". ".$this->Html->link($book['Book']['id']." (".$book['Book']['status'].")", array('controller' => 'QuesSixChecks', 'action' => 'print_q6', $book['Book']['id']), array('class' => $book['Book']['status'] == "Pending"?'redStatus':""));
echo "<br />";
}

}

		?>
	</fieldset>
	<br />
</div>