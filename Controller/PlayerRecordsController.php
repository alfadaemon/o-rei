<?php
App::uses('AppController', 'Controller');
/**
 * PlayerRecords Controller
 *
 * @property PlayerRecord $PlayerRecord
 */
class PlayerRecordsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayerRecord->recursive = 0;
		$this->set('playerRecords', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlayerRecord->exists($id)) {
			throw new NotFoundException(__('Invalid player record'));
		}
		$options = array('conditions' => array('PlayerRecord.' . $this->PlayerRecord->primaryKey => $id));
		$this->set('playerRecord', $this->PlayerRecord->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayerRecord->create();
			if ($this->PlayerRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The player record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$players = $this->PlayerRecord->Player->find('list');
		$teamTournaments = $this->PlayerRecord->TeamTournament->find('list');
		$positions = $this->PlayerRecord->Position->find('list');
		$this->set(compact('players', 'teamTournaments', 'positions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PlayerRecord->exists($id)) {
			throw new NotFoundException(__('Invalid player record'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayerRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The player record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('PlayerRecord.' . $this->PlayerRecord->primaryKey => $id));
			$this->request->data = $this->PlayerRecord->find('first', $options);
		}
		$players = $this->PlayerRecord->Player->find('list');
		$teamTournaments = $this->PlayerRecord->TeamTournament->find('list');
		$positions = $this->PlayerRecord->Position->find('list');
		$this->set(compact('players', 'teamTournaments', 'positions'));
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
		$this->PlayerRecord->id = $id;
		if (!$this->PlayerRecord->exists()) {
			throw new NotFoundException(__('Invalid player record'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlayerRecord->delete()) {
			$this->Session->setFlash(__('Player record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Player record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlayerRecord->recursive = 0;
		$this->set('playerRecords', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlayerRecord->exists($id)) {
			throw new NotFoundException(__('Invalid player record'));
		}
		$options = array('conditions' => array('PlayerRecord.' . $this->PlayerRecord->primaryKey => $id));
		$this->set('playerRecord', $this->PlayerRecord->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PlayerRecord->create();
			if ($this->PlayerRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The player record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$players = $this->PlayerRecord->Player->find('list');
		$teamTournaments = $this->PlayerRecord->TeamTournament->find('list');
		$positions = $this->PlayerRecord->Position->find('list');
		$this->set(compact('players', 'teamTournaments', 'positions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PlayerRecord->exists($id)) {
			throw new NotFoundException(__('Invalid player record'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayerRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The player record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('PlayerRecord.' . $this->PlayerRecord->primaryKey => $id));
			$this->request->data = $this->PlayerRecord->find('first', $options);
		}
		$players = $this->PlayerRecord->Player->find('list');
		$teamTournaments = $this->PlayerRecord->TeamTournament->find('list');
		$positions = $this->PlayerRecord->Position->find('list');
		$this->set(compact('players', 'teamTournaments', 'positions'));
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
		$this->PlayerRecord->id = $id;
		if (!$this->PlayerRecord->exists()) {
			throw new NotFoundException(__('Invalid player record'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlayerRecord->delete()) {
			$this->Session->setFlash(__('Player record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Player record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
