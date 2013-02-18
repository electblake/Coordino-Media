<?php

/**
 * Generic AppComponent
 *
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       debug_kit
 * @subpackage    debug_kit.controllers.components
 * @since         DebugKit 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Component', 'Controller');
class AppComponent extends Component {

/**
  * Set controller and do good definition
  * @param Controller object to attach to
  * @param settings for Connect
  * @return void
  * @access public
  */
  public function initialize(&$Controller, $settings = array()){
    $this->Controller = $Controller;
    $this->_set($settings);
  }
  
}