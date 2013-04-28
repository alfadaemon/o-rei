<div class="row-fluid">
	<div class="span12 well">
		<center>
<div class="row-fluid">
	<div id='header' class="span12">
		<center><h4><?php echo	$MatchDaysInfo[0]['Matchday']['local_score'].' - '.$MatchDaysInfo[0]['local_team']['name'] ?> VS <?php echo	$MatchDaysInfo[0]['visit_team']['name'].' - '.$MatchDaysInfo[0]['Matchday']['visit_score'] ?></h4></center>
		<center><p><?php echo	$MatchDaysInfo[0]['Matchday']['location'].' - '.$MatchDaysInfo[0]['Matchday']['matchdate'] ?></p></center>
	</div>
</div>
		</center>
	</div>
</div>

<div class="row-fluid">
	<div id="local_team" class="span6 well">
	    <table class="table table-bordered">
	    	 <caption><?php echo $MatchDaysInfo[0]['local_team']['name'] ?></caption>
				<thead>
					<tr>
						<th>Name</th>
						<!--<th>Position</th>-->
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($LocalTeam as $team):
					?>
					<tr>
					<td><?php echo $team['players']['firstname'].' '.$team['players']['flastname'] ?></td>
					<!--<td><?php echo $team['positions']['name']?></td>-->
					<td><?php
					echo $this->Form->create();
					$RulesFilter=null;
					foreach ($Rules as $rule):
						if($rule['Rules']['position_id']==$team['player_records']['position_id'])
							$RulesFilter[$rule['Rules']['id']]=$rule['Rules']['name'];
					endforeach;
					echo $this->Form->input( 'player_record_id', array( 'value' => $team['player_records']['player_id'] , 'type' => 'hidden') ); 
					echo $this->Form->input( 'matchday_id', array( 'value' => $MatchDaysInfo[0]['Matchday']['id']  , 'type' => 'hidden') ); 
					echo $this->Form->input($team['player_records']['player_id'], array('label'=>false,'options' => $RulesFilter,'empty'=>true, 'class' => 'span6'));
					echo '<button id="Submit'.$team['player_records']['player_id'].'" class="btn" type="submit">Button</button>';
					echo $this->Form->end();
										
					$this->Js->get('#Submit'.$team['player_records']['player_id']);
					$this->Js->event(
					    'click',
					    $this->Js->request(
					        array('controller' => 'matchdays','action' => 'set_player_statistics'),
					        array('async' => true, 'update' => '#local_team','method' => 'POST','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))
					    )
					);
					echo $this->Js->writeBuffer(); 
					?></td>
					</tr>
						<?php endforeach; ?>
				</tbody>
		</table>
	</div>
	<div id="visit_team" class="span6 well">
				<table class="table table-bordered">
	    	 <caption><?php echo $MatchDaysInfo[0]['visit_team']['name'] ?></caption>
				<thead>
					<tr>
						<th>Name</th>
						<!--<th>Position</th>-->
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				
					<?php
					foreach ($VisitTeam as $team):
					?>
					<tr>
					<td><?php echo $team['players']['firstname'].' '.$team['players']['flastname'] ?></td>
					<!--<td><?php echo $team['positions']['name']?></td>-->
					<td><?php
					echo $this->Form->create('Form'.$team['player_records']['player_id']);
					$RulesFilter=null;
					foreach ($Rules as $rule):
						if($rule['Rules']['position_id']==$team['player_records']['position_id'])
							$RulesFilter[$rule['Rules']['id']]=$rule['Rules']['name'];
					endforeach;
					echo $this->Form->input( 'player_record_id', array( 'value' => $team['player_records']['player_id'] , 'type' => 'hidden') ); 
					echo $this->Form->input( 'matchday_id', array( 'value' => $MatchDaysInfo[0]['Matchday']['id']  , 'type' => 'hidden') ); 
					echo $this->Form->input($team['player_records']['player_id'], array('label'=>false,'options' => $RulesFilter,'empty'=>true, 'class' => 'span6'));
					echo '<button id="Submit'.$team['player_records']['player_id'].'" class="btn" type="submit">Button</button>';
					echo $this->Form->end();
										
					$this->Js->get('#Submit'.$team['player_records']['player_id']);
					$this->Js->event(
					    'click',
					    $this->Js->request(
					        array('controller' => 'matchdays','action' => 'set_player_statistics'),
					        array('async' => true, 'update' => '#local_team','method' => 'POST','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))
					    )
					);
					echo $this->Js->writeBuffer(); 
					?></td>
					</tr>
						<?php endforeach; ?>
				</tbody>
		</table>
	</div>
</div>
<div id='sending' style="display: none;">...</div>