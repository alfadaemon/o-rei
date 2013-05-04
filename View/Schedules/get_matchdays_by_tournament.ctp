<?php 
foreach ($MatchDaysList as $MatchDays):
if(is_null($MatchDays['Matchday']['local_score']))
	$MatchDays['Matchday']['local_score']=0;
if(is_null($MatchDays['Matchday']['visit_score']))
	$MatchDays['Matchday']['visit_score']=0;
?>

<p>
<button id='<?php echo 'matchday'.$MatchDays['Matchday']['id']; ?>' class="btn btn-block btn-inverse btn-primary" type="button">
	<?php echo $MatchDays['Teams']['local_team_name'].' VS '.$MatchDays['Teams_two']['visit_team_name']; ?>
</button>
</p>
<?php	
$this->Js->get('#matchday'.$MatchDays['Matchday']['id']);
$this->Js->event(
    'click',
    $this->Js->request(
        array('controller' => 'schedules','action' => 'get_players_by_team',$MatchDays['Matchday']['id']),
        array('async' => true, 'update' => '#element')
    )
);

endforeach; ?>
<?php echo $this->Js->writeBuffer(); ?>