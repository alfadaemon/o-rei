
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="userTeams view">

			<h2><?php  echo __('User Team'); ?></h2>

			<table class="table table-striped table-bordered">
		<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($userTeam['UserTeam']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tournament'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($userTeam['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $userTeam['Tournament']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related User Players'); ?></h3>
				
				<?php if (!empty($userTeam['UserPlayer'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Player Record Id'); ?></th>
		<th><?php echo __('Position Id'); ?></th>
		<th><?php echo __('Creation Date'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('User Team Id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($userTeam['UserPlayer'] as $userPlayer): ?>
		<tr>
			<td><?php echo $userPlayer['id']; ?></td>
			<td><?php echo $userPlayer['player_record_id']; ?></td>
			<td><?php echo $userPlayer['position_id']; ?></td>
			<td><?php echo $userPlayer['creation_date']; ?></td>
			<td><?php echo $userPlayer['points']; ?></td>
			<td><?php echo $userPlayer['user_team_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_players', 'action' => 'view', $userPlayer['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_players', 'action' => 'edit', $userPlayer['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_players', 'action' => 'delete', $userPlayer['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $userPlayer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New User Player'), array('controller' => 'user_players', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

