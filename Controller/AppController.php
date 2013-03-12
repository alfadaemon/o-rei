<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller 
{
	public $components = array('Auth','Session','Error', 'DebugKit.Toolbar');
	public $use = array('Tournament');

	public function beforeFilter()
	{
		$this->Auth->authenticate = array('Form');

		$this->Auth->loginRedirect = array('action' => 'home', 'controller' => 'users');
		$this->Auth->logoutRedirect = array('action' => 'home', 'controller' => 'pages');
		$this->Auth->authError = 'You are not allowed to see that.';

		# To enable spanish language as main
		Configure::write('Config.language', 'spa');

		if( AuthComponent::user('id') ) {
			$this->loadModel('Tournament');
			$conditions = array('Tournament.active'=>1);
			$tournaments = $this->Tournament->find('list', array('conditions'=>$conditions));
			$this->set(compact('tournaments'));
		}
	}	
}


