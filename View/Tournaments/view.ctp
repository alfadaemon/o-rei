
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Tournament'), array('action' => 'edit', $tournament['Tournament']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tournament'), array('action' => 'delete', $tournament['Tournament']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $tournament['Tournament']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leagues'), array('controller' => 'leagues', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New League'), array('controller' => 'leagues', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matchdays'), array('controller' => 'matchdays', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matchday'), array('controller' => 'matchdays', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournaments  Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="tournaments view">

			<h2><?php  echo __('Tournament'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($tournament['Tournament']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($tournament['Tournament']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('League'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($tournament['League']['name'], array('controller' => 'leagues', 'action' => 'view', $tournament['League']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Start Year'); ?></strong></td>
		<td>
			<?php echo h($tournament['Tournament']['start_year']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Active'); ?></strong></td>
		<td>
			<?php echo h($tournament['Tournament']['active']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Matchdays'); ?></h3>
				
				<?php if (!empty($tournament['Matchday'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Local Score'); ?></th>
		<th><?php echo __('Visit Score'); ?></th>
		<th><?php echo __('Matchdate'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('Local Team Id'); ?></th>
		<th><?php echo __('Visit Team Id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($tournament['Matchday'] as $matchday): ?>
		<tr>
			<td><?php echo $matchday['id']; ?></td>
			<td><?php echo $matchday['local_score']; ?></td>
			<td><?php echo $matchday['visit_score']; ?></td>
			<td><?php echo $matchday['matchdate']; ?></td>
			<td><?php echo $matchday['location']; ?></td>
			<td><?php echo $matchday['comment']; ?></td>
			<td><?php echo $matchday['tournament_id']; ?></td>
			<td><?php echo $matchday['local_team_id']; ?></td>
			<td><?php echo $matchday['visit_team_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'matchdays', 'action' => 'view', $matchday['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'matchdays', 'action' => 'edit', $matchday['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'matchdays', 'action' => 'delete', $matchday['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $matchday['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Matchday'), array('controller' => 'matchdays', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

					
			<div class="related">

				<h3><?php echo __('Related Team Tournaments'); ?></h3>
				
				<?php if (!empty($tournament['Tournaments_TeamTournaments'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($tournament['Tournaments_TeamTournaments'] as $tournamentsTeamTournaments): ?>
		<tr>
			<td><?php echo $tournamentsTeamTournaments['id']; ?></td>
			<td><?php echo $tournamentsTeamTournaments['tournament_id']; ?></td>
			<td><?php echo $tournamentsTeamTournaments['team_id']; ?></td>
			<td><?php echo $tournamentsTeamTournaments['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'team_tournaments', 'action' => 'view', $tournamentsTeamTournaments['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'team_tournaments', 'action' => 'edit', $tournamentsTeamTournaments['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'team_tournaments', 'action' => 'delete', $tournamentsTeamTournaments['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $tournamentsTeamTournaments['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Tournaments  Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

