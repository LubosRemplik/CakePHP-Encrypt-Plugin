<?php

class PgpComponent extends Object {
	
	function format($text) {
		$text = str_replace("'", "", $text);
		$text = str_replace("(", "-", $text);
		$text = str_replace(")", "-", $text);
		return $text;
	}
	
	function encrypt($home = "/home/lubos/.gnupg", $recipient, $message) {
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