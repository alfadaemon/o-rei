
<div id="page-container" class="row-fluid">
	<div id="sidebar" class="span3 well">
		<div class="actions">
			<h5><center><?php echo $userTeams['Tournament']['name']; ?></h5></center>
			<ul class="nav nav-list bs-docs-sidenav">
				
				<?php foreach($Teams as $team): ?>
				<p>
					<button id='<?php echo 'team'.$team['TeamTournament']['id']; ?>' class="btn btn-block btn-inverse btn-primary" type="button">
						<?php echo $team['Team']['name']; ?>
					</button>
				</p>
				<?php
					$this->Js->get('#team'.$team['TeamTournament']['id']);
					$this->Js->event(
    					'click',
    					$this->Js->request(
        					array('controller' => 'UserPlayers','action' => 'get_players',$team['TeamTournament']['id'], $userTeams['UserTeam']['id']),
        					array('async' => true, 'update' => '#team-players')
    					)
					);
				?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div><!-- #sidebar .span3 -->
	
	<div id="team-players" class="span4 well">
		<?php echo __('Select a Team'); ?>
	</div>
	
	<div id="userplayers" class="span5 well">
			<h5><?php echo $userTeams['UserTeam']['name'];?></h5>
			<div id="user-players">
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
					<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userPlayer['UserPlayer']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $userPlayer['PlayerRecord']['name'])); ?>
					
					<button id='<?php echo 'player'.$userPlayer['UserPlayer']['id']; ?>' class="btn btn-mini" type="button">
						<?php echo __('Delete');?>
					</button>
					<?php
						$this->Js->get('#player'.$userPlayer['UserPlayer']['id']);
						$this->Js->event(
		    				'click',
		    				$this->Js->request(
		        				array('controller'=>'UserPlayers', 'action' => 'del_player', $userPlayer['UserPlayer']['user_team_id'], $userPlayer['UserPlayer']['id']),
		        				array('async' => true, 'update' => '#user-players')
		    				)
						);
					?>
				</td>
				</tr>
				<?php endforeach; ?>
			</table>
			</div>
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

