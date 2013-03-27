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
