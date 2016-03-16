<?php
class stacshack {
	public function __construct() {

		}
		
	public function checkGithub() {
		$host = 'github.com';
		if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
		echo "status: " . "online";
		fclose($socket);
		} else {
			echo "status: " . "offline";
		}
	}
}

$a = new stacshack();
$a->checkGithub();
?>