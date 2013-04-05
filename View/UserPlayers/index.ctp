
<div id="page-container" class="row-fluid">
	<div id="sidebar" class="span3 well">
		<div class="actions">
			<h5><?php echo $userTeams['Tournament']['name']; ?></h5>
			<ul class="nav nav-list bs-docs-sidenav">
				<?php foreach($Teams as $team): ?>
				<li>
					<?php echo $this->Html->link($team['Team']['name'], array('controller' => 'player_records', 'action' => 'add')); ?> 
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span5 well">
		<h5><?php echo __('Please select a team.'); ?></h5>
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo __('Player'); ?></th>
											<th><?php echo __('Position'); ?></th>
											<th class="actions">&nbsp;</th>
				</tr>
				<?php
				foreach ($userPlayers as $userPlayer): ?>
				<tr>
				<td>
					<?php echo $this->Html->link($userPlayer['PlayerRecord']['name'], array('controller' => 'player_records', 'action' => 'view', $userPlayer['PlayerRecord']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($userPlayer['Position']['name'], array('controller' => 'positions', 'action' => 'view', $userPlayer['Position']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userPlayer['UserPlayer']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete %s?', $userPlayer['PlayerRecord']['name'])); ?>
				</td>
				</tr>
				<?php endforeach; ?>
			</table>
	</div>
	
	<div id="page-content" class="span4 well">
		<div id="userPlayers">
			<h5><?php echo $userTeams['UserTeam']['name'];?></h5>
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo __('Player'); ?></th>
											<th><?php echo __('Position'); ?></th>
											<th class="actions">&nbsp;</th>
				</tr>
				<?php
				foreach ($userPlayers as $userPlayer): ?>
				<tr>
				<td>
				<?php echo $this->Html->link($userPlayer['PlayerRecord']['name'], array('controller' => 'player_records', 'action' => 'view', $userPlayer['PlayerRecord']['id'])); ?>
				</td>
				<td>
				<?php echo $this->Html->link($userPlayer['Position']['name'], array('controller' => 'positions', 'action' => 'view', $userPlayer['Position']['id'])); ?>
				</td>
				<td class="actions">
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userPlayer['UserPlayer']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $userPlayer['PlayerRecord']['name'])); ?>
				</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

