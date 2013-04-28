<?php
class SchedulesController extends AppController {
	public $helpers = array('Js' => array('Jquery'));

	public function index() {
		$options['conditions'] = array('Tournament.active'=>1);
		$options['order'] = array('Tournament.name');
		$this->loadModel('Tournament');
		$this->set('Tournaments',$this->Tournament->find('list',$options));
	}
	
	public function get_teams_by_tournament(){
			$this->layout = 'ajax';
			$options['joins'] = array(
			    array('table' => 'team_tournaments',
			    'alias' => 'TeamTournament',
		        'type' => 'RIGHT',
		        'conditions' => array('TeamTournament.tournament_id'=>$this->request->data['tournaments']['tournament_id'], 'TeamTournament.active = 1')
		        
			    )
			);
			$options['fields'] = array('TeamTournament.id','Team.name');
			$options['conditions'] = array('Team.id = TeamTournament.team_id','Team.active = 1');
			$this->loadModel('Team');
			$this->Team->recursive=0;
			$this->set('Teams',$this->Team->find('list',$options));	
			$this->set('TournamentId',$this->request->data['tournaments']['tournament_id']);
	}
	
	public function get_matchdays_by_tournament($TournamentId=0) {
			$this->layout = 'ajax';
			$condicion="";
			if($this->request->data['teams']['team_id']!=NULL)
				$condicion = 'Matchday.local_team_id LIKE '.$this->request->data['teams']['team_id'].' or Matchday.visit_team_id LIKE '.$this->request->data['teams']['team_id']; 
			$options['joins'] = array(
		    	array('table' => 'team_tournaments',
		        'alias' => 'TeamTournaments',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Matchday.local_team_id = TeamTournaments.id',
			        )
			    ),
			    array('table' => 'teams',
		        'alias' => 'Teams',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Teams.id = TeamTournaments.team_id',
			        )
			    ),
				array('table' => 'team_tournaments',
		        'alias' => 'TeamTournaments_two',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Matchday.visit_team_id = TeamTournaments_two.id',
			        )
			    ),
				array('table' => 'teams',
		        'alias' => 'Teams_two',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Teams_two.id = TeamTournaments_two.team_id',
			        )
			    ),
			);
			$options['fields'] = array('Matchday.id','Matchday.local_score','Matchday.visit_score','Matchday.matchdate','Matchday.location','Teams.id AS local_team_id' ,'Teams.name AS local_team_name' ,'Teams_two.id AS visit_team_id', 'Teams_two.name AS visit_team_name');
			$options['conditions'] = array('Matchday.tournament_id'=>$TournamentId, $condicion );
			$options['order'] = array('Matchday.matchdate');
			$this->loadModel('Matchday');
			$this->set('MatchDaysList',$this->Matchday->find('all',$options));		
	}

	public function get_players_by_team($matchday) {
		$this->layout = 'ajax';
		// Matchday information
		$options['joins'] = array(
		    	array('table' => 'team_tournaments',
		        'alias' => 'TeamTournaments',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Matchday.local_team_id = TeamTournaments.id',
			        )
			    ),
			    array('table' => 'teams',
		        'alias' => 'Teams',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Teams.id = TeamTournaments.team_id',
			        )
			    ),
				array('table' => 'team_tournaments',
		        'alias' => 'TeamTournaments_two',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Matchday.visit_team_id = TeamTournaments_two.id',
			        )
			    ),
				array('table' => 'teams',
		        'alias' => 'Teams_two',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Teams_two.id = TeamTournaments_two.team_id',
			        )
			    ),
			);
			$options['fields'] = array('Matchday.local_score','Matchday.visit_score','Matchday.matchdate','Matchday.location','Teams.id' ,'Teams.name' ,'Teams_two.id' ,'Teams_two.name');
			$options['conditions'] = array('Matchday.id'=>$matchday);
			$options['limit']=1;
			$this->loadModel('Matchday');
			$this->Matchday->recursive=0;
			$mdi = $this->Matchday->find('all',$options);
			$this->set('MatchDaysInfo',$mdi );	
			//print_r($mdi);
			$localteam = $mdi[0]['Teams']['id'];
			$visitteam = $mdi[0]['Teams_two']['id'];
		//	
				
		// Local Team Query
		$options['joins'] = array(
				//INNER JOIN `misuperonce`.`player_records` ON `player_records`.`id` = `player_statistics`.`player_record_id`
		    	array('table' => 'player_records',
		        'alias' => 'PlayerRecords',
		        'type' => 'INNER',
		        'conditions' => array(
		            'PlayerRecords.id = PlayerStatistic.player_record_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`players` ON `players`.`id` = `player_records`.`player_id`
			    array('table' => 'players',
		        'alias' => 'Players',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Players.id = PlayerRecords.player_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`team_tournaments` ON `team_tournaments`.`id` = `player_records`.`team_tournament_id`
			    array('table' => 'team_tournaments',
		        'alias' => 'TeamTournaments',
		        'type' => 'INNER',
		        'conditions' => array(
		            'TeamTournaments.id = PlayerRecords.team_tournament_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`teams` ON `teams`.`id` = `team_tournaments`.`team_id`
				array('table' => 'teams',
		        'alias' => 'Teams',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Teams.id = TeamTournaments.team_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`positions` ON `positions`.`id` = `player_records`.`position_id`
			    array('table' => 'positions',
		        'alias' => 'Positions',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Positions.id = PlayerRecords.position_id',
			        )
			    )
		);
		$options['fields'] = array('Players.id','Players.firstname','Players.flastname','Positions.name','SUM(PlayerStatistic.points) AS points' );
		$options['conditions'] = array('PlayerStatistic.matchday_id' => $matchday,'TeamTournaments.team_id' => $localteam);
		$options['order'] = array('Players.id');
		$options['group'] = 'Players.id';
		$this->loadModel('PlayerStatistic');
		$this->PlayerStatistic->recursive=0;
		$options['limit']=null;
		$this->set('LocalTeam',$this->PlayerStatistic->find('all',$options));
		// End Local Team Query
		
		// Visit Team Query
		$options['joins'] = array(
				//INNER JOIN `misuperonce`.`player_records` ON `player_records`.`id` = `player_statistics`.`player_record_id`
		    	array('table' => 'player_records',
		        'alias' => 'PlayerRecords',
		        'type' => 'INNER',
		        'conditions' => array(
		            'PlayerRecords.id = PlayerStatistic.player_record_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`players` ON `players`.`id` = `player_records`.`player_id`
			    array('table' => 'players',
		        'alias' => 'Players',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Players.id = PlayerRecords.player_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`team_tournaments` ON `team_tournaments`.`id` = `player_records`.`team_tournament_id`
			    array('table' => 'team_tournaments',
		        'alias' => 'TeamTournaments',
		        'type' => 'INNER',
		        'conditions' => array(
		            'TeamTournaments.id = PlayerRecords.team_tournament_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`teams` ON `teams`.`id` = `team_tournaments`.`team_id`
				array('table' => 'teams',
		        'alias' => 'Teams',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Teams.id = TeamTournaments.team_id',
			        )
			    ),
			    // INNER JOIN `misuperonce`.`positions` ON `positions`.`id` = `player_records`.`position_id`
			    array('table' => 'positions',
		        'alias' => 'Positions',
		        'type' => 'INNER',
		        'conditions' => array(
		            'Positions.id = PlayerRecords.position_id',
			        )
			    )
		);
		$options['fields'] = array('Players.id','Players.firstname','Players.flastname','Positions.name','SUM(PlayerStatistic.points) AS points' );
		$options['conditions'] = array('PlayerStatistic.matchday_id' => $matchday,'TeamTournaments.team_id' => $visitteam);
		$options['order'] = array('Players.id');
		$options['group'] = 'Players.id';
		$this->PlayerStatistic->recursive=0;
		$this->set('VisitTeam',$this->PlayerStatistic->find('all',$options));	
		// End Visit Team Query
	}

}
?>