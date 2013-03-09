
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Tournament'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="teams view">

			<h2><?php  echo __('Team'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($team['Team']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($team['Team']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Country'); ?></strong></td>
		<td>
			<?php echo h($team['Team']['country']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tshirt'); ?></strong></td>
		<td>
			<?php echo h($team['Team']['tshirt']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Active'); ?></strong></td>
		<td>
			<?php echo h($team['Team']['active']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Team Tournaments'); ?></h3>
				
				<?php if (!empty($team['TeamTournament'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($team['TeamTournament'] as $teamTournament): ?>
		<tr>
			<td><?php echo $teamTournament['id']; ?></td>
			<td><?php echo $teamTournament['name']; ?></td>
			<td><?php echo $teamTournament['tournament_id']; ?></td>
			<td><?php echo $teamTournament['team_id']; ?></td>
			<td><?php echo $teamTournament['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'team_tournaments', 'action' => 'view', $teamTournament['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'team_tournaments', 'action' => 'edit', $teamTournament['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'team_tournaments', 'action' => 'delete', $teamTournament['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $teamTournament['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Team Tournament'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

