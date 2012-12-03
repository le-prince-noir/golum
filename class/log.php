<?php

class log {
	public static function add($e) {
		$file = './log/log.txt';
		if(file_exists($file)) { $mode = 'a+'; } else { $mode = 'w+'; }
		if(!($file = fopen($file, $mode))) { return false; } else {
			fputs($file, date('Y-m-d H:i:s').' - Error: '.$e->getMessage()."\n");
			fclose($file);
			return true;
		}
	}
}
