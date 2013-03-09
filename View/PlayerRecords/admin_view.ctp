
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Player Record'), array('action' => 'edit', $playerRecord['PlayerRecord']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player Record'), array('action' => 'delete', $playerRecord['PlayerRecord']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $playerRecord['PlayerRecord']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Records'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Record'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Tournament'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('controller' => 'player_statistics', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Teams'), array('controller' => 'user_teams', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Team'), array('controller' => 'user_teams', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="playerRecords view">

			<h2><?php  echo __('Player Record'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($playerRecord['PlayerRecord']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($playerRecord['PlayerRecord']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Player'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($playerRecord['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $playerRecord['Player']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Team Tournament'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($playerRecord['TeamTournament']['name'], array('controller' => 'team_tournaments', 'action' => 'view', $playerRecord['TeamTournament']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Position'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($playerRecord['Position']['name'], array('controller' => 'positions', 'action' => 'view', $playerRecord['Position']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Active'); ?></strong></td>
		<td>
			<?php echo h($playerRecord['PlayerRecord']['active']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Player Statistics'); ?></h3>
				
				<?php if (!empty($playerRecord['PlayerStatistic'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Player Record Id'); ?></th>
		<th><?php echo __('Matchday Id'); ?></th>
		<th><?php echo __('Rule Id'); ?></th>
		<th><?php echo __('Points'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($playerRecord['PlayerStatistic'] as $playerStatistic): ?>
		<tr>
			<td><?php echo $playerStatistic['id']; ?></td>
			<td><?php echo $playerStatistic['player_record_id']; ?></td>
			<td><?php echo $playerStatistic['matchday_id']; ?></td>
			<td><?php echo $playerStatistic['rule_id']; ?></td>
			<td><?php echo $playerStatistic['points']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'player_statistics', 'action' => 'view', $playerStatistic['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'player_statistics', 'action' => 'edit', $playerStatistic['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'player_statistics', 'action' => 'delete', $playerStatistic['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $playerStatistic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

					
			<div class="related">

				<h3><?php echo __('Related User Teams'); ?></h3>
				
				<?php if (!empty($playerRecord['UserTeam'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($playerRecord['UserTeam'] as $userTeam): ?>
		<tr>
			<td><?php echo $userTeam['id']; ?></td>
			<td><?php echo $userTeam['name']; ?></td>
			<td><?php echo $userTeam['user_id']; ?></td>
			<td><?php echo $userTeam['tournament_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_teams', 'action' => 'view', $userTeam['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_teams', 'action' => 'edit', $userTeam['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_teams', 'action' => 'delete', $userTeam['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $userTeam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New User Team'), array('controller' => 'user_teams', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

