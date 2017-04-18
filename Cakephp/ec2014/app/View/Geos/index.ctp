<?php echo $this -> Session -> flash(); ?>
<fieldset>
	<legend>
		কোডের&nbsp;তালিকা
	</legend>
	<div class="master_tbl">
		<ul class="list_with_icon">
			</br>

			<li>
				<?php echo $this -> Html -> link('GEO Code', array('plugin' => '', 'controller' => 'Geos', 'action' => 'get_geo')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('BSIC Code', array('plugin' => '', 'controller' => 'Geos', 'action' => 'get_ind')); ?>
			</li>

			<li>
				<?php echo $this -> Html -> link('ISIC Code', array('plugin' => '', 'controller' => 'Geos', 'action' => 'isic_pdf')); ?>
			</li>
			<li>
				<?php echo $this -> Html -> link('BCPC Code', array('plugin' => '', 'controller' => 'Geos', 'action' => 'get_prod')); ?>
			</li>

		</ul>
	</div>
</fieldset>
<br>
<br>
