<?php 
foreach ($MatchDaysList as $MatchDays):?>
<p>
<button id='<?php echo 'matchday'.$MatchDays['Matchday']['id']; ?>' class="btn btn-block btn-primary" type="button">
	<?php echo $MatchDays['Teams']['local_team_name'].' '.$MatchDays['Matchday']['local_score']. ' - '.$MatchDays['Matchday']['visit_score'].' '.$MatchDays['Teams_two']['visit_team_name']; ?>
</button>
</p>
<?php	
$this->Js->get('#matchday'.$MatchDays['Matchday']['id']);
$this->Js->event(
    'click',
    $this->Js->request(
        array('controller' => 'schedules','action' => 'get_players_by_team',$MatchDays['Matchday']['id'],$MatchDays['Teams']['local_team_id'],$MatchDays['Teams_two']['visit_team_id']),
        array('async' => true, 'update' => '#element')
    )
);

endforeach; ?>
<?php echo $this->Js->writeBuffer(); ?>