
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Html->link(__('List Player Records'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Tournament'), array('controller' => 'team_tournaments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('controller' => 'player_statistics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Teams'), array('controller' => 'user_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Team'), array('controller' => 'user_teams', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="playerRecords form">
		
			<?php echo $this->Form->create('PlayerRecord'); ?>
				<fieldset>
					<h2><?php echo __('Add Player Record'); ?></h2>
				<?php
		echo "<div class='control-group'>";
		echo $this->Form->input('name', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('player_id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('team_tournament_id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('position_id', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('active', array('class' => 'span12'));
		echo "</div>";
	?>
				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

