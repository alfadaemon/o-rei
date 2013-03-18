
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Matchday.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Matchday.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Matchdays'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('controller' => 'player_statistics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="matchdays form">
		
			<?php echo $this->Form->create('Matchday'); ?>
				<fieldset>
					<h2><?php echo __('Edit Matchday'); ?></h2>
				<?php
		echo "<div class='control-group'>";
		echo $this->Form->input('id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('local_score', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('visit_score', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('matchdate', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('location', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('comment', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('tournament_id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('local_team_id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('visit_team_id', array('class' => 'span12'));
		echo "</div>";
	?>
				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

