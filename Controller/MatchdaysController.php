<?php
App::uses('AppController', 'Controller');
/**
 * Matchdays Controller
 *
 * @property Matchday $Matchday
 */
class MatchdaysController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Matchday->recursive = 0;
		$this->set('matchdays', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Matchday->exists($id)) {
			throw new NotFoundException(__('Invalid matchday'));
		}
		$options = array('conditions' => array('Matchday.' . $this->Matchday->primaryKey => $id));
		$this->set('matchday', $this->Matchday->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			//TODO: Validate that the teams are not the same
			
			//Get the teams' name for the Matchday name field
			$this->loadModel('Team');
			$this->Team->recursive = -1;
			$conditions = array('id'=>$this->request->data['Matchday']['local_team_id']);
			$localTeam = $this->Team->find('first', array('conditions'=>$conditions));
			$conditions = array('id'=>$this->request->data['Matchday']['visit_team_id']);
			$visitTeam = $this->Team->find('first', array('conditions'=>$conditions));
			
			$this->request->data['Matchday']['name']=$localTeam['Team']['name'].' vs '.$visitTeam['Team']['name'];
			$this->Matchday->create();
			if ($this->Matchday->save($this->request->data)) {
				$this->Session->setFlash(__('The matchday has been saved'), 'flash/success');
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The matchday could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$tournaments = $this->Matchday->Tournament->find('list');
		$localTeams = $this->Matchday->LocalTeam->find('list');
		$visitTeams = $this->Matchday->VisitTeam->find('list');
		$this->set(compact('tournaments', 'localTeams', 'visitTeams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Matchday->exists($id)) {
			throw new NotFoundException(__('Invalid matchday'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Matchday->save($this->request->data)) {
				$this->Session->setFlash(__('The matchday has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchday could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Matchday.' . $this->Matchday->primaryKey => $id));
			$this->request->data = $this->Matchday->find('first', $options);
		}
		$tournaments = $this->Matchday->Tournament->find('list');
		$localTeams = $this->Matchday->LocalTeam->find('list');
		$visitTeams = $this->Matchday->VisitTeam->find('list');
		$this->set(compact('tournaments', 'localTeams', 'visitTeams'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Matchday->id = $id;
		if (!$this->Matchday->exists()) {
			throw new NotFoundException(__('Invalid matchday'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Matchday->delete()) {
			$this->Session->setFlash(__('Matchday deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Matchday was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Matchday->recursive = 0;
		$this->set('matchdays', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Matchday->exists($id)) {
			throw new NotFoundException(__('Invalid matchday'));
		}
		$options = array('conditions' => array('Matchday.' . $this->Matchday->primaryKey => $id));
		$this->set('matchday', $this->Matchday->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Matchday->create();
			if ($this->Matchday->save($this->request->data)) {
				$this->Session->setFlash(__('The matchday has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchday could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$tournaments = $this->Matchday->Tournament->find('list');
		$localTeams = $this->Matchday->LocalTeam->find('list');
		$visitTeams = $this->Matchday->VisitTeam->find('list');
		$this->set(compact('tournaments', 'localTeams', 'visitTeams'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Matchday->exists($id)) {
			throw new NotFoundException(__('Invalid matchday'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Matchday->save($this->request->data)) {
				$this->Session->setFlash(__('The matchday has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchday could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Matchday.' . $this->Matchday->primaryKey => $id));
			$this->request->data = $this->Matchday->find('first', $options);
		}
		$tournaments = $this->Matchday->Tournament->find('list');
		$localTeams = $this->Matchday->LocalTeam->find('list');
		$visitTeams = $this->Matchday->VisitTeam->find('list');
		$this->set(compact('tournaments', 'localTeams', 'visitTeams'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Matchday->id = $id;
		if (!$this->Matchday->exists()) {
			throw new NotFoundException(__('Invalid matchday'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Matchday->delete()) {
			$this->Session->setFlash(__('Matchday deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Matchday was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

	public function set_match_records($matchday)
	{
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
			$options['fields'] = array('Matchday.local_score','Matchday.visit_score','Matchday.matchdate','Matchday.location','Teams.id','Teams.name','Teams_two.id' ,'Teams_two.name');
			$options['conditions'] = array('Matchday.id'=>$matchday);
			$options['limit']=1;
			$this->loadModel('Matchday');
			$this->Matchday->recursive=0;
			$mdi=$this->Matchday->find('all',$options);
			$this->set('MatchDaysInfo',$mdi);
		//	End Matchday information
		
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
		$options['fields'] = array('Players.id','Players.firstname','Players.nickname','Players.flastname','Positions.name','SUM(PlayerStatistic.points) AS points' );
		$options['conditions'] = array('PlayerStatistic.matchday_id' => $matchday,'TeamTournaments.team_id' => $mdi[0]['Teams']['id']);
		$options['order'] = array('Players.id');
		$this->loadModel('PlayerStatistic');
		$this->PlayerStatistic->recursive=0;
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
		$options['fields'] = array('Players.id','Players.firstname','Players.nickname','Players.flastname','Positions.name','SUM(PlayerStatistic.points) AS points' );
		$options['conditions'] = array('PlayerStatistic.matchday_id' => $matchday,'TeamTournaments.team_id' => $mdi[0]['Teams_two']['id']);
		$options['order'] = array('Players.id');
		$this->PlayerStatistic->recursive=0;
		$this->set('VisitTeam',$this->PlayerStatistic->find('all',$options));	
		// End Visit Team Query
	}
}
