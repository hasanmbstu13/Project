<?php echo $this->Session->flash(); ?>
<div id="content">
	<div class="container">
		<div class="section span6 offset3">
			<div class="row-fluid">
				<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'reset_password')));?>
				<div class="section-header">
					<h3><?php  echo __('Reset Password'); ?></h3>
				</div>
				<div class="section-body">
					
		
	<?php echo $this->Form->input('loginoremail', array('label'=>__('User ID'), 'size'=>'40', 'list' => 'sdfsdfdf', 'type' => 'text'));?>
	<?php echo $this->Form->input('loginpassword', array('label'=>__('Password'),'type' => 'password', 'size'=>'40'));?>
				


				</div>
				<div class="section-footer">
					<div class="control-group">
						<div class="form-actions">
						<?php echo $this->Form->end(array('div'=>false,'label'=>'Submit','class'=>'action input-action btn btn-info'));?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 
<style>

input[type="password"], select:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.8) inset;
    outline: 0 none;
}
input[type="password"], select {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 0 none;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.8) inset;
    height: 25px;
    width: 200px;
}

</style>