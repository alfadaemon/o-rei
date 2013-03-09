
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit User Player'), array('action' => 'edit', $userPlayer['UserPlayer']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Player'), array('action' => 'delete', $userPlayer['UserPlayer']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $userPlayer['UserPlayer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Players'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Player'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Records'), array('controller' => 'player_records', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Record'), array('controller' => 'player_records', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matchdays'), array('controller' => 'matchdays', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matchday'), array('controller' => 'matchdays', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Teams'), array('controller' => 'user_teams', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Team'), array('controller' => 'user_teams', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="userPlayers view">

			<h2><?php  echo __('User Player'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($userPlayer['UserPlayer']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Player Record'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($userPlayer['PlayerRecord']['name'], array('controller' => 'player_records', 'action' => 'view', $userPlayer['PlayerRecord']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Position'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($userPlayer['Position']['name'], array('controller' => 'positions', 'action' => 'view', $userPlayer['Position']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Creation Date'); ?></strong></td>
		<td>
			<?php echo h($userPlayer['UserPlayer']['creation_date']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Points'); ?></strong></td>
		<td>
			<?php echo h($userPlayer['UserPlayer']['points']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User Team'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($userPlayer['UserTeam']['name'], array('controller' => 'user_teams', 'action' => 'view', $userPlayer['UserTeam']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

