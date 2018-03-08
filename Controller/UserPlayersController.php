<?php
App::uses('AppController', 'Controller');
/**
 * UserPlayers Controller
 *
 * @property UserPlayer $UserPlayer
 */
class UserPlayersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($userTeamId = 0) {
		$this->UserPlayer->recursive = 0;
		//TODO: validate that $userTeamId is a team from the user
		$conditions = array('user_team_id'=> $userTeamId);
		$this->paginate = array(
	        'conditions' => $conditions
    	);
		$this->set('userPlayers', $this->paginate());
		$userTeams = $this->UserPlayer->UserTeam->findById($userTeamId);
		
		$this->loadModel('TeamTournament');
		$this->TeamTournament->recursive = 0;
		$Teams=$this->TeamTournament->findAllByTournamentId($userTeams['Tournament']['id'], array('TeamTournament.id', 'Team.name'), array('Team.name ASC'));
		
		$this->set(compact('userTeams', 'Teams'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid user player'));
		}
		$options = array('conditions' => array('UserPlayer.' . $this->UserPlayer->primaryKey => $id));
		$this->set('userPlayer', $this->UserPlayer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserPlayer->create();
			if ($this->UserPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The user player has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user player could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$playerRecords = $this->UserPlayer->PlayerRecord->find('list');
		$positions = $this->UserPlayer->Position->find('list');
		$userTeams = $this->UserPlayer->UserTeam->find('list');
		$this->set(compact('playerRecords', 'positions', 'userTeams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid user player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The user player has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user player could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserPlayer.' . $this->UserPlayer->primaryKey => $id));
			$this->request->data = $this->UserPlayer->find('first', $options);
		}
		$playerRecords = $this->UserPlayer->PlayerRecord->find('list');
		$positions = $this->UserPlayer->Position->find('list');
		$userTeams = $this->UserPlayer->UserTeam->find('list');
		$this->set(compact('playerRecords', 'positions', 'userTeams'));
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
		$this->UserPlayer->id = $id;
		if (!$this->UserPlayer->exists()) {
			throw new NotFoundException(__('Invalid user player'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPlayer->delete()) {
			$this->Session->setFlash(__('User player deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User player was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * get_players method
 * 
 * @param integer $teamTournament
 * @return Players Record from selected team in the actual tournament
 * @return void
 */
 	public function get_players($teamTournament=0, $userTeamId){
 		$this->layout='ajax';
 		if($teamTournament!=0){
 			$players = $this->UserPlayer->PlayerRecord->find('all',
														array(
															'fields'=>array('PlayerRecord.id', 'PlayerRecord.name', 'Position.name', 'Position.id', 'TeamTournament.name'),
															'conditions'=>array('TeamTournament.id'=>$teamTournament)));
			$this->set(compact('players', 'userTeamId'));
 		} else {
 			$this->Session->setFlash(__('No tournament selected'), 'flash/error');
 		}
 	}
	
/**
 * add_player method
 * 
 * @param integer $userTeamId
 * @param integer $playerRecordId
 * @param integer $positionId
 * @return Players Record from selected team in the actual tournament
 * @return void
 */
 	public function add_player($userTeamId=0, $playerRecordId=0, $positionId=0){
 		$this->layout='ajax';
 		if($userTeamId!=0 && $playerRecordId!=0 && $positionId!=0){
			$this->UserPlayer->create();
			$data['user_team_id']=$userTeamId;
			$data['player_record_id']=$playerRecordId;
			$data['position_id']=$positionId;
			$data['creation_date'] = date("Y-m-d H:i:s");
			if($this->UserPlayer->save($data)) {
				$this->Session->setFlash(__('The user player has been saved'), 'flash/success');
			} else {
				$this->Session->setFlash(__('The user player could not be saved. Please, try again.'), 'flash/error');
			}
 		} else {
 			$this->Session->setFlash(__('Bad parameters list'), 'flash/error');
 		}
		$userPlayers = $this->UserPlayer->find('all', array(
												'conditions'=>array('user_team_id'=>$userTeamId)
												)
											);
		$this->set(compact('userPlayers'));
 	}
	
/**
 * del_player method
 * 
 * @param integer $userPlayerId
 * @return Players Record from selected team in the actual tournament
 * @return void
 */
 	public function del_player($userTeamId=null, $id=null){
 		$this->layout='ajax';
		//TODO: Validate that $id is an id for one of the user's player
		$this->UserPlayer->id = $id;
		if (!$this->UserPlayer->exists()) {
			throw new NotFoundException(__('Invalid user player'));
		}
		//$this->request->onlyAllow('del_player', 'delete');
		if ($this->UserPlayer->delete()) {
			$this->Session->setFlash(__('User player deleted'), 'flash/success');
		} else {
			$this->Session->setFlash(__('User player was not deleted'), 'flash/error');
		}
		$userPlayers = $this->UserPlayer->find('all', array(
											'conditions'=>array('user_team_id'=>$userTeamId)
											)
										);
		$this->set(compact('userPlayers'));
		$this->render('add_player');
 	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserPlayer->recursive = 0;
		$this->set('userPlayers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid user player'));
		}
		$options = array('conditions' => array('UserPlayer.' . $this->UserPlayer->primaryKey => $id));
		$this->set('userPlayer', $this->UserPlayer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserPlayer->create();
			if ($this->UserPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The user player has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user player could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$playerRecords = $this->UserPlayer->PlayerRecord->find('list');
		$positions = $this->UserPlayer->Position->find('list');
		$userTeams = $this->UserPlayer->UserTeam->find('list');
		$this->set(compact('playerRecords', 'positions', 'userTeams'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid user player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The user player has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user player could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserPlayer.' . $this->UserPlayer->primaryKey => $id));
			$this->request->data = $this->UserPlayer->find('first', $options);
		}
		$playerRecords = $this->UserPlayer->PlayerRecord->find('list');
		$positions = $this->UserPlayer->Position->find('list');
		$userTeams = $this->UserPlayer->UserTeam->find('list');
		$this->set(compact('playerRecords', 'positions', 'userTeams'));
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
		$this->UserPlayer->id = $id;
		if (!$this->UserPlayer->exists()) {
			throw new NotFoundException(__('Invalid user player'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPlayer->delete()) {
			$this->Session->setFlash(__('User player deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User player was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
