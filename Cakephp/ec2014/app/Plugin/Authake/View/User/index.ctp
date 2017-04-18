<div id="content">
	<div class="container">
		<div class="section">
			
			<div class="section-body">
				<div class="row-fluid">
					
					<div class="span10">
						
						<div class="well well-small">
							<?php echo $this->Form->create('User', array('url' => array('controller' => 'user', 'action'=>'index')));?>
							<fieldset>
						        <legend><?php echo __('Change Password');?></legend>
						    	<?php
						        
						        echo $this->Form->input('password1', array('type'=>'password', 'label'=> __('New Password') , 'value' => '', 'size'=>'40'));
						        echo $this->Form->input('password2', array('type'=>'password',  'label'=> __('Confirm Password'), 'value' => '', 'size'=>'40'));
						    	?>
							</fieldset>
								<?php echo $this->Form->end(array('div'=>false,'label'=>'Save','class'=>'action input-action btn btn-success'));?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
