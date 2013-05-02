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
			<?php echo $this->Form->postLink(__('Add'), array('action' => 'add', $player['PlayerRecord']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<? endforeach; ?>
</table>
