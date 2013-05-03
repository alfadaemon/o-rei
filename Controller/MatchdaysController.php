<?php
App::uses('AppController', 'Controller');
/**
 * Matchdays Controller
 *
 * @property Matchday $Matchday
 */
class MatchdaysController extends AppController {
		public	$helpers = array('Js' => array('Jquery'));
		public	$components = array('RequestHandler');
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
			$this->Matchday->create();
			$this->request->data['Matchday']['local_score']=0;
			$this->request->data['Matchday']['visit_score']=0;
			
			if($this->request->data['Matchday']['local_team_id']!=$this->request->data['Matchday']['visit_team_id']){
				$localTeam = $this->Matchday->LocalTeam->find('first', 
														array(
															'fields'=>array('Team.name'),
															'conditions'=> array( 'LocalTeam.id'=>
																	$this->request->data['Matchday']['local_team_id'])));
				$visitTeam = $this->Matchday->VisitTeam->find('first', 
														array(
															'fields'=>array('Team.name'),
															'conditions'=> array( 'VisitTeam.id'=>
															$this->request->data['Matchday']['visit_team_id'])));
			
				$teamName = $localTeam['Team']['name'].' vs '.$visitTeam['Team']['name'];
			
				$this->request->data['Matchday']['name']=$teamName;
			
				if ($this->Matchday->save($this->request->data)) {
					$this->Session->setFlash(__('The matchday has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The matchday could not be saved. Please, try again.'), 'flash/error');
				}
			} else {
				$this->Session->setFlash(__('The teams must be different.'), 'flash/error');
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
		        'type' => 'INNER',
		        'conditions' => array(
		            'team_tournaments.id = Matchday.local_team_id',
			        )
			    ),
			    array('table' => 'teams',
		        'alias' => 'local_team',
		        'type' => 'INNER',
		        'conditions' => array(
		            'local_team.id = team_tournaments.team_id',
			        )
			    ),
				array('table' => 'team_tournaments',
		        'alias' => 'team_tournaments_for_visit',
		        'type' => 'INNER',
		        'conditions' => array(
		            'team_tournaments_for_visit.id = Matchday.visit_team_id',
			        )
			    ),
				array('table' => 'teams',
		        'alias' => 'visit_team',
		        'type' => 'INNER',
		        'conditions' => array(
		            'visit_team.id = team_tournaments_for_visit.team_id',
			        )
			    ),
			);
			$options['fields'] = array('team_tournaments.id','Matchday.id',
										'Matchday.local_team_id','local_team.name' ,
										'Matchday.local_score', 'Matchday.visit_team_id',
										'visit_team.name','Matchday.visit_score',
										'Matchday.matchdate','Matchday.location');
			$options['conditions'] = array('Matchday.id'=>$matchday);
			$options['limit']=1;
			$this->loadModel('Matchday');
			$this->Matchday->recursive=0;
			$mdi=$this->Matchday->find('all',$options);
			$this->set('MatchDaysInfo',$mdi);
			if($mdi!=null)
			{
		//	End Matchday information
		
		// Local Team Query
		/*$options['joins'] = array(
				//INNER JOIN `misuperonce`.`player_records` ON `player_records`.`id` = `player_statistics`.`player_record_id`
		    	array('table' => 'player_records',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'player_records.team_tournament_id = TeamTournament.id','player_records.active' => TRUE
			        )
			    ),
			    // INNER JOIN `misuperonce`.`players` ON `players`.`id` = `player_records`.`player_id`
			    array('table' => 'players',
		        'type' => 'INNER',
		        'conditions' => array(
		            'players.id = player_records.player_id'
			        )
			    )
		);
		$options['fields'] = array('player_records.id' , 'player_records.player_id', 'players.firstname','players.flastname', 'player_records.position_id');
		$options['conditions'] = array('TeamTournament.id'=>$mdi[0]['Matchday']['local_team_id']);
		$options['order'] = array('player_records.player_id');
		$this->loadModel('TeamTournament');
		//$this->TeamTournament->recursive=1;
		$this->set('LocalTeam',$this->TeamTournament->find('all',$options));
		*/$this->loadModel('TeamTournament');	
		$this->set('LocalTeam',$this->TeamTournament->query('SELECT `player_records`.`id` , `player_records`.`player_id`, `players`.`firstname`,`players`.`flastname`, `player_records`.`position_id`,`positions`.`name`
FROM `team_tournaments`
LEFT JOIN `player_records`
ON `player_records`.`team_tournament_id` = `team_tournaments`.`id` 
AND `player_records`.`active` = TRUE
RIGHT JOIN `positions`
ON `positions`.`id` = `player_records`.`position_id`
INNER JOIN `players`
ON `players`.`id` = `player_records`.`player_id`
WHERE `team_tournaments`.`id` ='.$mdi[0]['Matchday']['local_team_id'].' AND `team_tournaments`.`active`=TRUE'));
		// End Local Team Query
		
		// Visit Team Query
			/*$options['joins'] = array(
				//INNER JOIN `misuperonce`.`player_records` ON `player_records`.`id` = `player_statistics`.`player_record_id`
		    	array('table' => 'player_records',
		        'type' => 'LEFT',
		        'conditions' => array(
		            'player_records.team_tournament_id = TeamTournament.id','player_records.active' => TRUE
			        )
			    ),
			    // INNER JOIN `misuperonce`.`players` ON `players`.`id` = `player_records`.`player_id`
			    array('table' => 'players',
		        'type' => 'INNER',
		        'conditions' => array(
		            'players.id = player_records.player_id'
			        )
			    )
		);
		$options['fields'] = array('player_records.id' , 'player_records.player_id', 'players.firstname','players.flastname', 'player_records.position_id');
		$options['conditions'] = array('TeamTournament.id'=>$mdi[0]['Matchday']['visit_team_id']);
		$options['order'] = array('player_records.player_id');
		$this->loadModel('TeamTournament');
		//$this->PlayerRecord->recursive=0;
		$this->set('VisitTeam',$this->TeamTournament->find('all',$options)); 
		*/$this->loadModel('TeamTournament');	
		$this->set('VisitTeam',$this->TeamTournament->query('SELECT `player_records`.`id` , `player_records`.`player_id`, `players`.`firstname`,`players`.`flastname`, `player_records`.`position_id`,`positions`.`name`
FROM `team_tournaments`
LEFT JOIN `player_records`
ON `player_records`.`team_tournament_id` = `team_tournaments`.`id` 
AND `player_records`.`active` = TRUE
RIGHT JOIN `positions`
ON `positions`.`id` = `player_records`.`position_id`
INNER JOIN `players`
ON `players`.`id` = `player_records`.`player_id`
WHERE `team_tournaments`.`id` ='.$mdi[0]['Matchday']['visit_team_id'].' AND `team_tournaments`.`active`=TRUE'));
		// End Visit Team Query
		
		$this->loadModel('Rules');
		$this->set('Rules',$this->Rules->find('all'));
		}
		
	}

	public function set_player_statistics($player_record_id)
	{
		if ($this->request->is('post')) {
			if(!empty($this->request->data))
			{
				if(!empty($this->request->data['Form'.$player_record_id]['rule_id']))
				{
					print_r($this->request->data['Form'.$player_record_id]);
					$this->loadModel('Rule');
					$rule =$this->Rule->findById($this->request->data['Form'.$player_record_id]['rule_id']);					
					$data = array('player_record_id' => $player_record_id,
					'matchday_id' => $this->request->data['Form'.$player_record_id]['matchday_id'],
					'rule_id' => $this->request->data['Form'.$player_record_id]['rule_id'],
					'points'=> $rule['Rule']['weight']);
					
					//If the form data can be validated and saved...
					$this->loadModel('PlayerStatistic');
			       	if ($this->PlayerStatistic->save($data)) {
			            // Set a session flash message and redirect.
			            $this->Session->setFlash('Record Saved!');
			        }
				}
			}
	    }
	}
}
