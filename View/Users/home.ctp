<div class="row-fluid">
	
	<div class="span12">
		<?php echo $this->Session->flash() ?>
		
		<h2><?php echo __('You are logged in') ?>, <strong><?php echo AuthComponent::user('username') ?></strong> </h2>
		<hr>
	</div>

</div>
