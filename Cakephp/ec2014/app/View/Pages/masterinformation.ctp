<style>
	.master_tbl {
		height: 500 px;
		width: 600 px;
		margin-top: 20 px;
		padding: 12px;
	}
</style>
<?php echo $this -> Session -> flash(); ?>
<fieldset>
	<legend>
		GEO Code
	</legend>
	<div class="master_tbl">
		<ul class="list_with_icon">
			<li>
				<?php echo $this -> Html -> link('Division', array('controller' => 'GeoCodeDivns', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('District', array('controller' => 'GeoCodeZilas', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Upazila/Thana', array('controller' => 'GeoCodeUpazilas', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('RMO', array('controller' => 'GeoCodeRmos', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('PSA/City Corporation', array('controller' => 'GeoCodePsas', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Union', array('controller' => 'GeoCodeUnions', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Mauzas', array('controller' => 'GeoCodeMauzas', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Villages', array('controller' => 'GeoCodeVillages', 'action' => 'index')); ?>
			</li>
		</ul>
	</div>
</fieldset>
<br>
<br>

<fieldset>
	<legend>
		BSIC Code
	</legend>
	<div class="master_tbl">
		<ul class="list_with_icon">

			<li>
				<?php echo $this -> Html -> link('Division', array('controller' => 'IndCodeDivns', 'action' => 'index')); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('Group', array('controller' => 'IndCodeGroups', 'action' => 'index')); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('Class', array('controller' => 'IndCodeClasses', 'action' => 'index')); ?>
			</li>
		</ul>
	</div>
</fieldset>

</br>
</br>

<fieldset>
	<legend>
		Product Code
	</legend>
	<div class="master_tbl">
		<ul class="list_with_icon">

			<li>
				<?php echo $this -> Html -> link('Division', array('controller' => 'ProdCodeDivns', 'action' => 'index')); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('Group', array('controller' => 'ProdCodeGroups', 'action' => 'index')); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('Section', array('controller' => 'ProdCodeSections', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Class', array('controller' => 'ProdCodeClasses', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Sub-Class', array('controller' => 'ProdCodeSubClasses', 'action' => 'index')); ?>
			</li>
		</ul>
	</div>
</fieldset>

</br>
</br>

<fieldset>
	<legend>
		Unit Head
	</legend>
	<div class="master_tbl">
		<ul class="list_with_icon">
			<li>
				<?php echo $this -> Html -> link('Economy', array('controller' => 'UnitHeadEconomies', 'action' => 'index')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('Education', array('controller' => 'UnitHeadEducations', 'action' => 'index')); ?>
			</li>
		</ul>
	</div>
</fieldset>
<br />
<fieldset>
    <legend>
        Notice
    </legend>
    <div class="master_tbl">
        <ul class="list_with_icon">
            <li>
                <?php echo $this -> Html -> link('Notice', array('controller' => 'Notices', 'action' => 'index')); ?>
            </li>

        </ul>
    </div>
</fieldset>

<br />
