<?php
/**
 * Decrypt Component 
 **/
class DecryptComponent extends Component {
    
    public $components = array();

    function __construct(ComponentCollection $collection, $settings = array()) {
        parent::__construct($collection, $settings);
    }

    public function initialize($controller) {
    }

    public function startup($controller) {
    }

    public function beforeRender($controller) {
    }

    public function shutdown($controller) {
    }

    public function beforeRedirect($controller, $url, $status=null, $exit=true) {
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
