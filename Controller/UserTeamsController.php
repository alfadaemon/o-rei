<?php
App::uses('AppController', 'Controller');
/**
 * UserTeams Controller
 *
 * @property UserTeam $UserTeam
 */
class UserTeamsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserTeam->recursive = 0;
		$this->paginate = array(
	        'conditions' => array('UserTeam.user_id' => AuthComponent::user('id'))
    	);
    	$userTeams = $this->paginate('UserTeam');
    	$this->set(compact('userTeams'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserTeam->exists($id)) {
			throw new NotFoundException(__('Invalid user team'));
		}
		$options = array('conditions' => array('UserTeam.' . $this->UserTeam->primaryKey => $id));
		$this->set('userTeam', $this->UserTeam->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserTeam->create();
			if ($this->UserTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The user team has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user team could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->UserTeam->User->find('list');
		$tournaments = $this->UserTeam->Tournament->find('list');
		$this->set(compact('users', 'tournaments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserTeam->exists($id)) {
			throw new NotFoundException(__('Invalid user team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The user team has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user team could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserTeam.' . $this->UserTeam->primaryKey => $id));
			$this->request->data = $this->UserTeam->find('first', $options);
		}
		$users = $this->UserTeam->User->find('list');
		$tournaments = $this->UserTeam->Tournament->find('list');
		$this->set(compact('users', 'tournaments'));
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
		$this->UserTeam->id = $id;
		if (!$this->UserTeam->exists()) {
			throw new NotFoundException(__('Invalid user team'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserTeam->delete()) {
			$this->Session->setFlash(__('User team deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User team was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserTeam->recursive = 0;
		$this->set('userTeams', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserTeam->exists($id)) {
			throw new NotFoundException(__('Invalid user team'));
		}
		$options = array('conditions' => array('UserTeam.' . $this->UserTeam->primaryKey => $id));
		$this->set('userTeam', $this->UserTeam->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserTeam->create();
			if ($this->UserTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The user team has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user team could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->UserTeam->User->find('list');
		$tournaments = $this->UserTeam->Tournament->find('list');
		$this->set(compact('users', 'tournaments'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserTeam->exists($id)) {
			throw new NotFoundException(__('Invalid user team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The user team has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user team could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserTeam.' . $this->UserTeam->primaryKey => $id));
			$this->request->data = $this->UserTeam->find('first', $options);
		}
		$users = $this->UserTeam->User->find('list');
		$tournaments = $this->UserTeam->Tournament->find('list');
		$this->set(compact('users', 'tournaments'));
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
		$this->UserTeam->id = $id;
		if (!$this->UserTeam->exists()) {
			throw new NotFoundException(__('Invalid user team'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserTeam->delete()) {
			$this->Session->setFlash(__('User team deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User team was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
