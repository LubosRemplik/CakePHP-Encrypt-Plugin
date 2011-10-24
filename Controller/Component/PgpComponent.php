<?php
/**
 * Pgp Component 
 **/
class PgpComponent extends Component {
    
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

	public function format($text) {
		$text = str_replace("'", "", $text);
		$text = str_replace("(", "-", $text);
		$text = str_replace(")", "-", $text);
		return $text;
	}
	
	public function encrypt($home = "/home/lubos/.gnupg", $recipient, $message) {
		$debugThis = Configure::read('PGPMail.debug');
		
		$home = escapeshellarg($home);
		$recipient = escapeshellarg($recipient);
		$message = escapeshellarg($message);
		
		$script = ROOT.DS."plugins".DS."encrypt".DS."vendors".DS."encrypt.sh";
		@chmod($script, '+x');
		$command = $script." ".$home." ".$recipient." ".$message;
		
		if ($debugThis) debug($command);
		
		$returnValue = exec($command, $ret, $err);
		
		if ($debugThis) debug($returnValue);
		if ($debugThis) debug($ret);
		if ($debugThis) debug($err);
		
		$messageEncrypted = "";
		for ($i=0; $i < count($ret); $i++) {
			$messageEncrypted = $messageEncrypted.$ret[$i] . "\n";
		}
		
		if ($debugThis) debug($messageEncrypted);
		
		return $messageEncrypted;
	}
}
