<?php
App::uses('AppController', 'Controller');
/**
 * PlayerStatistics Controller
 *
 * @property PlayerStatistic $PlayerStatistic
 */
class PlayerStatisticsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayerStatistic->recursive = 0;
		$this->set('playerStatistics', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlayerStatistic->exists($id)) {
			throw new NotFoundException(__('Invalid player statistic'));
		}
		$options = array('conditions' => array('PlayerStatistic.' . $this->PlayerStatistic->primaryKey => $id));
		$this->set('playerStatistic', $this->PlayerStatistic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayerStatistic->create();
			if ($this->PlayerStatistic->save($this->request->data)) {
				$this->Session->setFlash(__('The player statistic has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player statistic could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$playerRecords = $this->PlayerStatistic->PlayerRecord->find('list');
		$matchdays = $this->PlayerStatistic->Matchday->find('list');
		$rules = $this->PlayerStatistic->Rule->find('list');
		$this->set(compact('playerRecords', 'matchdays', 'rules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PlayerStatistic->exists($id)) {
			throw new NotFoundException(__('Invalid player statistic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayerStatistic->save($this->request->data)) {
				$this->Session->setFlash(__('The player statistic has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player statistic could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('PlayerStatistic.' . $this->PlayerStatistic->primaryKey => $id));
			$this->request->data = $this->PlayerStatistic->find('first', $options);
		}
		$playerRecords = $this->PlayerStatistic->PlayerRecord->find('list');
		$matchdays = $this->PlayerStatistic->Matchday->find('list');
		$rules = $this->PlayerStatistic->Rule->find('list');
		$this->set(compact('playerRecords', 'matchdays', 'rules'));
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
		$this->PlayerStatistic->id = $id;
		if (!$this->PlayerStatistic->exists()) {
			throw new NotFoundException(__('Invalid player statistic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlayerStatistic->delete()) {
			$this->Session->setFlash(__('Player statistic deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Player statistic was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlayerStatistic->recursive = 0;
		$this->set('playerStatistics', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlayerStatistic->exists($id)) {
			throw new NotFoundException(__('Invalid player statistic'));
		}
		$options = array('conditions' => array('PlayerStatistic.' . $this->PlayerStatistic->primaryKey => $id));
		$this->set('playerStatistic', $this->PlayerStatistic->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PlayerStatistic->create();
			if ($this->PlayerStatistic->save($this->request->data)) {
				$this->Session->setFlash(__('The player statistic has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player statistic could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$playerRecords = $this->PlayerStatistic->PlayerRecord->find('list');
		$matchdays = $this->PlayerStatistic->Matchday->find('list');
		$rules = $this->PlayerStatistic->Rule->find('list');
		$this->set(compact('playerRecords', 'matchdays', 'rules'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PlayerStatistic->exists($id)) {
			throw new NotFoundException(__('Invalid player statistic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayerStatistic->save($this->request->data)) {
				$this->Session->setFlash(__('The player statistic has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player statistic could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('PlayerStatistic.' . $this->PlayerStatistic->primaryKey => $id));
			$this->request->data = $this->PlayerStatistic->find('first', $options);
		}
		$playerRecords = $this->PlayerStatistic->PlayerRecord->find('list');
		$matchdays = $this->PlayerStatistic->Matchday->find('list');
		$rules = $this->PlayerStatistic->Rule->find('list');
		$this->set(compact('playerRecords', 'matchdays', 'rules'));
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
		$this->PlayerStatistic->id = $id;
		if (!$this->PlayerStatistic->exists()) {
			throw new NotFoundException(__('Invalid player statistic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlayerStatistic->delete()) {
			$this->Session->setFlash(__('Player statistic deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Player statistic was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
