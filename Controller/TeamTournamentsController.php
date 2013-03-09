<?php
App::uses('AppController', 'Controller');
/**
 * TeamTournaments Controller
 *
 * @property TeamTournament $TeamTournament
 */
class TeamTournamentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TeamTournament->recursive = 0;
		$this->set('teamTournaments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeamTournament->exists($id)) {
			throw new NotFoundException(__('Invalid team tournament'));
		}
		$options = array('conditions' => array('TeamTournament.' . $this->TeamTournament->primaryKey => $id));
		$this->set('teamTournament', $this->TeamTournament->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeamTournament->create();
			if ($this->TeamTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The team tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team tournament could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$tournaments = $this->TeamTournament->Tournament->find('list');
		$teams = $this->TeamTournament->Team->find('list');
		$this->set(compact('tournaments', 'teams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TeamTournament->exists($id)) {
			throw new NotFoundException(__('Invalid team tournament'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TeamTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The team tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team tournament could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('TeamTournament.' . $this->TeamTournament->primaryKey => $id));
			$this->request->data = $this->TeamTournament->find('first', $options);
		}
		$tournaments = $this->TeamTournament->Tournament->find('list');
		$teams = $this->TeamTournament->Team->find('list');
		$this->set(compact('tournaments', 'teams'));
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
		$this->TeamTournament->id = $id;
		if (!$this->TeamTournament->exists()) {
			throw new NotFoundException(__('Invalid team tournament'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeamTournament->delete()) {
			$this->Session->setFlash(__('Team tournament deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Team tournament was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TeamTournament->recursive = 0;
		$this->set('teamTournaments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TeamTournament->exists($id)) {
			throw new NotFoundException(__('Invalid team tournament'));
		}
		$options = array('conditions' => array('TeamTournament.' . $this->TeamTournament->primaryKey => $id));
		$this->set('teamTournament', $this->TeamTournament->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TeamTournament->create();
			if ($this->TeamTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The team tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team tournament could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$tournaments = $this->TeamTournament->Tournament->find('list');
		$teams = $this->TeamTournament->Team->find('list');
		$this->set(compact('tournaments', 'teams'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TeamTournament->exists($id)) {
			throw new NotFoundException(__('Invalid team tournament'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TeamTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The team tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team tournament could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('TeamTournament.' . $this->TeamTournament->primaryKey => $id));
			$this->request->data = $this->TeamTournament->find('first', $options);
		}
		$tournaments = $this->TeamTournament->Tournament->find('list');
		$teams = $this->TeamTournament->Team->find('list');
		$this->set(compact('tournaments', 'teams'));
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
		$this->TeamTournament->id = $id;
		if (!$this->TeamTournament->exists()) {
			throw new NotFoundException(__('Invalid team tournament'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeamTournament->delete()) {
			$this->Session->setFlash(__('Team tournament deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Team tournament was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
