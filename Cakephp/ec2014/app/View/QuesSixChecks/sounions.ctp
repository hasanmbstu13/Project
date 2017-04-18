<?php echo $this -> Session -> flash(); ?>

<div id="new_book">
	<?php echo $this -> Html -> link(__('BACK TO UPAZILA'), array('controller' => 'QuesSixChecks', 'action' => 'soupazila', $questionaires[0]['Book']['geo_code_union_id'])); ?>
</div>
<br />
<fieldset>
	<legend>
		<?php  echo 'ইউনিয়ন&nbsp;/&nbsp;ওয়ার্ড&nbsp;নাম&nbsp;:&nbsp;' . $upazilaName[0]['GeoCodeUpazila']['upzila_name']; ?>
	</legend>

	<div class="actions">
		</br>
		<?php
foreach ($unionNames as $key => $unionName) {

echo ($key+1).". ".$this->Html->link( $unionName['GeoCodeUnion']['union_name'], array('controller' => 'QuesSixChecks', 'action' => 'sobooks', $unionName['GeoCodeUnion']['id']));
echo "<br />";
}
		?>
	</div>
</fieldset>
<br />
