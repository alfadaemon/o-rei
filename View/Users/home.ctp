<div class="row-fluid">
	
	<div class="span12">
		<?php echo $this->Session->flash() ?>
	</div>

</div>

<div class="row-fluid">
	<!-- div class="span4 well">
		<h2><?php echo __('My Teams'); ?></h2>
		<hr>
		<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
			<tr>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('team'); ?></th>
				<th><?php echo $this->Paginator->sort('score'); ?></th>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div -->
	<div class="span6 well">
		<h2><?php echo __('Players').' - '.__('Top 10'); ?></h2>
		<hr>
		<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
			<tr>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('team'); ?></th>
				<th><?php echo $this->Paginator->sort('score'); ?></th>
			</tr>
			<?php
			 foreach ($topTenPlayers as $player):?>
			<tr>
				<td><?php echo $player['Players']["nickname"]; ?></td>
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
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('team'); ?></th>
				<th><?php echo $this->Paginator->sort('tournament'); ?></th>
				<th><?php echo $this->Paginator->sort('score'); ?></th>
			</tr>
			<?php
			 foreach ($topTenUsers as $user):?>
			<tr>
				<td><?php echo $user['Users']["username"]; ?></td>
				<td><?php echo $user['UserTeams']["name"]; ?></td>
				<td><?php echo $user['Tournaments']["name"]; ?></td>
				<td><?php echo $user['0']["points"]; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
