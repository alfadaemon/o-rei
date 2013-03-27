<div class="row-fluid">
	
	<div class="span12">
		<?php echo $this->Session->flash() ?>
	</div>

</div>

<div class="row-fluid">
	<div class="span4 well">
		<div class="tournaments form">
			<?php echo $this->Form->create('tournaments'); ?>
				<fieldset>
					<?php
						echo "<div class='control-group'>";
						echo $this->Form->input('tournament_id', array('empty'=>true, 'class' => 'span12'));
						echo "</div>";
					?>
				</fieldset>
			<?php echo $this->Form->end(); ?>

			<?php echo $this->Form->create('team'); ?>
				<fieldset>
					<?php
						echo "<div class='control-group'>";
						echo $this->Form->input('team_id', array('empty'=>true, 'class' => 'span12'));
						echo "</div>";
					?>
				</fieldset>
			<?php echo $this->Form->end(); ?>
		</div>
		<div id="matchdays" class="row-fluid span11 well">
		</div>
	</div>
	<div id="element" class="span8 well">
	</div>
		
</div>
<?php 
$this->Js->get('#tournamentsTournamentId');
$this->Js->event(
    'change',
    $this->Js->request(
        array('controller' => 'schedules','action' => 'get_matchdays_by_tournament',1),
        array('async' => true, 'update' => '#matchdays','method' => 'POST','dataExpression'=>true,'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))
    )
);
?>

