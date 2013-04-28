<?php
echo $this->Form->create('teams'); ?>
	<fieldset>
		<?php
			echo "<div class='control-group'>";
			echo $this->Form->input('team_id', array('options' => $Teams,'empty'=>true, 'class' => 'span12'));
			echo "</div>";
		?>
	</fieldset>
<?php echo $this->Form->end(); ?>
<?php 
$this->Js->get('#teamsTeamId');
$this->Js->event(
    'change',
    $this->Js->request(
        array('controller' => 'schedules','action' => 'get_matchdays_by_tournament/'.$TournamentId),
        array('async' => true, 'update' => '#matchdays','method' => 'POST','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))
    )
);
echo $this->Js->writeBuffer(); 
?>