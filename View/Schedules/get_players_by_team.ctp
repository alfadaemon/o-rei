<div class="row-fluid">
	<div id='header' class="span12">
		<center><h4>score1 - <?php echo	$LocalTeam[0]['Teams']['name'] ?> VS <?php echo	$VisitTeam[0]['Teams']['name'] ?> - score2</h4></center>
		<center><p>fecha del partido</p></center>
	</div>
</div>

<div class="row-fluid">
<div id='local_team' class="span6">
	<table class="table table-striped table-bordered">
		
		<thead>
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Position');?></th>
				<th><?php echo __('Score');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($LocalTeam as $team): ?>
			<tr>
				<td><div data-toggle="tooltip" title="<?php echo $team['Players']['nickname']; ?>" ><?php echo $team['Players']['nickname'].' '.$team['Players']['flastname'];  ?></div></td>
				<td><?php echo $team['Positions']['name'] ?></td>
				<td><?php echo $team['0']['points'] ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
    </table>
</div>
<div id='visit_team' class="span6">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Position');?></th>
				<th><?php echo __('Score');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($VisitTeam as $team): ?>
			<tr>
				<td><div data-toggle="tooltip" title="<?php echo $team['Players']['nickname']; ?>" ><?php echo $team['Players']['nickname'].' '.$team['Players']['flastname'];	 ?></div></td>
				<td><?php echo $team['Positions']['name'] ?></td>
				<td><?php echo $team['0']['points'] ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
    </table>
</div>
</div>