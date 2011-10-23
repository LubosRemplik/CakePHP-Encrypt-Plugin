<?php
/**
 * Decrypt Component
 **/
class DecryptComponent extends Object {
    
    public $components = array();

    //called before Controller::beforeFilter()
    public function initialize(&$controller, $settings = array()) {
        // saving the controller reference for later use
        $this->controller =& $controller;
    }

    //called after Controller::beforeFilter()
    public function startup(&$controller) {
    
    }

    //called after Controller::beforeRender()
    public function beforeRender(&$controller) {
    
    }

    //called after Controller::render()
    public function shutdown(&$controller) {
    
    }

    //called before Controller::redirect()
    public function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
    
    }

    public function redirectSomewhere($value) {
        // utilizing a controller method
        $this->controller->redirect($value);
    }
	
	public function hex2bin($h) {
		if(!is_string($h)) return null;
		$r = '';
		for($a = 0; $a < strlen($h); $a += 2) { 
			$r .= chr(hexdec($h{$a}.$h{($a+1)}));
		}
		return $r;
	}
}
