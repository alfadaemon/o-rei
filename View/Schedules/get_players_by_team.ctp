<?php
if(is_null($MatchDaysInfo[0]['Matchday']['local_score']))
	$MatchDaysInfo[0]['Matchday']['local_score']=0;
if(is_null($MatchDaysInfo[0]['Matchday']['visit_score']))
	$MatchDaysInfo[0]['Matchday']['visit_score']=0;

?>
<div class="row-fluid">
	<div id='header' class="span12">
		<center><h4><?php echo	$MatchDaysInfo[0]['Matchday']['local_score'].' - '.$MatchDaysInfo[0]['Teams']['name'] ?> VS <?php echo	$MatchDaysInfo[0]['Teams_two']['name'].' - '.$MatchDaysInfo[0]['Matchday']['visit_score'] ?></h4></center>
		<center><p><?php echo	$MatchDaysInfo[0]['Matchday']['location'].' - '.$MatchDaysInfo[0]['Matchday']['matchdate'] ?></p></center>
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
				<td><?php echo $team[0]['points'] ?></td>
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
				<td><?php echo $team[0]['points'] ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
    </table>
</div>
</div>