<?php
class SchedulesController extends AppController {

	public function index() {
		$options['conditions'] = array('Tournament.active'=>1);
		$options['order'] = array('Tournament.name');
		$this->loadModel('Tournament');
		$this->set('Tournaments',$this->Tournament->find('list',$options));
	}
	
	public function get_matchdDays_by_tournament() {
		$options['conditions'] = array('Tournament.active'=>1);
		$options['order'] = array('Tournament.name');
		$this->loadModel('Tournament');
		$this->set('Tournaments',$this->Tournament->find('list',$options));
	}

}
?>