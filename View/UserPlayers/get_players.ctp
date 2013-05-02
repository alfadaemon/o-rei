<?php echo $this->Session->flash();?>
<h5><center><?php echo $players[0]['TeamTournament']['name']; ?></center></h5>
<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	<tr>
		<th><?php echo __('Player'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th class="actions">&nbsp;</th>
	</tr>
	<?php foreach ($players as $player): ?>
	<tr>
		<td>
			<?php echo $player['PlayerRecord']['name']; ?>
		</td>
		<td>
			<?php echo $player['Position']['name']; ?>
		</td>
		<td>
			<?php
				$sum=0;
				foreach($player['PlayerStatistic'] as $stats):
					$sum+=$stats['points'];
				endforeach;
				echo $sum;
			?>
		</td>
		<td>
			<button id='<?php echo 'player'.$player['PlayerRecord']['id']; ?>' class="btn btn-mini" type="button">
						add
			</button>
			<?php
				$this->Js->get('#player'.$player['PlayerRecord']['id']);
				$this->Js->event(
    				'click',
    				$this->Js->request(
        				array('controller'=>'UserPlayers', 'action' => 'add_player', $userTeamId, $player['PlayerRecord']['id'], $player['Position']['id']),
        				array('async' => true, 'update' => '#user-players')
    				)
				);
			?>
		</td>
	</tr>
	<? endforeach; ?>
</table>
<?php echo $this->Js->writeBuffer(); ?>