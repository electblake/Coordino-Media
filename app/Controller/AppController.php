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
class AppController extends Controller {

  public $pageTitle;
  public $Recaptcha;

  public $components = array(
  	'Auth',
  	'Session',
  	'Cakeless.Cakeless',
  	'TwitterBootstrap.TwitterBootstrap'
  );
  public $helper = array(
  	'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator')
	);

	public function beforeFilter() {

		/**
		 * reCAPTCHA API Information
		 */
		$this->Recaptcha->publickey =  Configure::read('recaptcha.publickey');
	  $this->Recaptcha->privatekey = Configure::read('recaptcha.privatekey');

	  $this->initLess();

	}

	public function initLess() {

		$files['app.less'] = 'app.css';
		$files['bootstrap/responsive.less'] = 'responsive.css';
		$this->Cakeless->compile_files($files);

		
	}

	public function getWidgets($page='') {
		if(empty($page)) { $page = Router::url(null, false); }
		//if(strpos($_SERVER['REQUEST_URI'], 'questions/') == 1) { $page = '/questions/view'; }
		$this->set('widgets', $this->Widget->findPage($page));
	}
	
	/**
	 * Set class var admin to true if the user id is admin.
	 * @param integer $id
	 */
	public function isAdmin( $id='') {
		if(!$this->User->adminCheck($id, 'update')) {
			$this->set('admin', true);
            return true;
		} else {
		    $this->set('admin', false);
		    return false;
		}
	}
	public function underMaintenance() {
		$maintenance = $this->Setting->find('first', array('conditions' => array('name' => 'site_maintenance')));
		if(($maintenance['Setting']['value'] == 'yes') && ($_SERVER['REQUEST_URI'] != '/maintenance')) {
			$this->redirect('/maintenance');
		}
	}
	public function __encrypt($string) {
	    return $string;
	}

	public function __decrypt($string) {
        return $string;
	}



}
