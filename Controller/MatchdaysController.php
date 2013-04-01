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
}
