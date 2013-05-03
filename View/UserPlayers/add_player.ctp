<?php echo $this->Session->flash();?>
<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	<tr>
		<th><?php echo __('Player'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th class="actions">&nbsp;</th>
	</tr>
	<?php foreach ($userPlayers as $userPlayer): ?>
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
<?php echo $this->Js->writeBuffer(); ?>