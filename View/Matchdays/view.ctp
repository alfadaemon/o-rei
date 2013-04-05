
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Matchday'), array('action' => 'edit', $matchday['Matchday']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Matchday'), array('action' => 'delete', $matchday['Matchday']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $matchday['Matchday']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matchdays'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matchday'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local Team'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('controller' => 'player_statistics', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="matchdays view">

			<h2><?php  echo __('Matchday'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Local Score'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['local_score']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Visit Score'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['visit_score']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Matchdate'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['matchdate']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Location'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['location']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Comment'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['comment']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tournament'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($matchday['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $matchday['Tournament']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Local Team Id'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['local_team_id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Visit Team Id'); ?></strong></td>
		<td>
			<?php echo h($matchday['Matchday']['visit_team_id']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Player Statistics'); ?></h3>
				
				<?php if (!empty($matchday['PlayerStatistic'])): ?>
				
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
								foreach ($matchday['PlayerStatistic'] as $playerStatistic): ?>
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

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

