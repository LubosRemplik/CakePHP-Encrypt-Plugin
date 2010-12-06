<?php

class DecryptComponent extends Object {
	
	public function hex2bin($h) {
		if(!is_string($h)) return null;
		$r = '';
		for($a = 0; $a < strlen($h); $a += 2) { 
			$r .= chr(hexdec($h{$a}.$h{($a+1)}));
		}
		return $r;
	}
}

