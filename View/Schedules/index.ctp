<div class="row-fluid">
	
	<div class="span12">
		<?php echo $this->Session->flash() ?>
	</div>

</div>

<div class="row-fluid">
	<div class="span5 well">
		<div class="tournaments form">
			<?php echo $this->Form->create('tournaments'); ?>
				<fieldset>
					<h6><?php echo __('Select a Tournament'); ?></h6>
					<?php
						echo "<div class='control-group'>";
						echo $this->Form->input('tournament_id', array('class' => 'span12 btn dropdown-toggle'));
						echo "</div>";
					?>
				</fieldset>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<div class="span7 well">
	</div>
		
</div>


