<div class="row-fluid">
	
	<div class="span12">
		<?php echo $this->Session->flash() ?>
	</div>

</div>

<div class="row-fluid">
	<div class="span6 well">
		<h2><?php echo __('Players').' - '.__('Top 10'); ?></h2>
		<hr>
		<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Team'); ?></th>
				<th><?php echo __('Score'); ?></th>
			</tr>
			<?php
			 foreach ($topTenPlayers as $player):?>
			<tr>
				<td><?php echo $player['Player']["nickname"]; ?></td>
				<td><?php echo $player['Teams']["name"]; ?></td>
				<td><?php echo $player['0']["points"]; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="span6 well">
		<h2><?php echo __('Users').' - '.__('Top 10'); ?></h2>
		<hr>
		<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
			<tr>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Team'); ?></th>
				<th><?php echo __('Tournament'); ?></th>
				<th><?php echo __('Score'); ?></th>
			</tr>
			<?php
			 foreach ($topTenUsers as $user):?>
			<tr>
				<td><?php echo $user['User']["username"]; ?></td>
				<td><?php echo $user['UserTeams']["name"]; ?></td>
				<td><?php echo $user['Tournaments']["name"]; ?></td>
				<td><?php echo $user['0']["points"]; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
