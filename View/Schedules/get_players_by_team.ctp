<div id='local_team' class="span6 well">
	<table class="table table-striped table-bordered">
		<caption><h4><?php echo	$LocalTeam[0]['Teams']['name'] ?></h4></caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Positión</th>
				<th>Points</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($LocalTeam as $team): ?>
			<tr>
				<td><div data-toggle="tooltip" title="<?php echo $team['Players']['firstname'].' -'.$team['Players']['nickname'].'- '.$team['Players']['flastname'] ?>" ><?php echo $team['Players']['nickname'].' '.$team['Players']['flastname'];  ?></div></td>
				<td><?php echo $team['Positions']['name'] ?></td>
				<td><?php echo $team['0']['points'] ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
    </table>
</div>
<div id='visit_team' class="span6 well">
	<table class="table table-striped table-bordered">
		<caption><h4><?php echo	$VisitTeam[0]['Teams']['name'] ?></h4></caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Positión</th>
				<th>Points</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($VisitTeam as $team): ?>
			<tr>
				<td><div data-toggle="tooltip" title="<?php echo $team['Players']['firstname'].' -'.$team['Players']['nickname'].'- '.$team['Players']['flastname'] ?>" ><?php echo $team['Players']['nickname'].' '.$team['Players']['flastname'];	 ?></div></td>
				<td><?php echo $team['Positions']['name'] ?></td>
				<td><?php echo $team['0']['points'] ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
    </table>
</div>