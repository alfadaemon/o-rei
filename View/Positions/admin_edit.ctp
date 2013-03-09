
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Position.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Position.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Positions'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Player Records'), array('controller' => 'player_records', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Record'), array('controller' => 'player_records', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Players'), array('controller' => 'user_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Player'), array('controller' => 'user_players', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="positions form">
		
			<?php echo $this->Form->create('Position'); ?>
				<fieldset>
					<h2><?php echo __('Edit Position'); ?></h2>
				<?php
		echo "<div class='control-group'>";
		echo $this->Form->input('id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('name', array('class' => 'span12'));
		echo "</div>";
	?>
				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

