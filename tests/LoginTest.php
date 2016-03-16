<?php
require_once "login.php";

	class LoginTest extends PHPUnit_Framework_TestCase
	{
		public function testEmpty() {
			$this->expectOutputString('{"result":[]}');
			
			$a = new Login();
			$a->login("","");
		}
		
		public function testStaff() {
			$this->expectOutputString('{"result":[{"UsersID":"1","UsersName":"Testing","Staff":"1","Student":"0"}]}');
			
			$a = new Login();
			$a->login("Testing","password");
		}
		
		public function testStudentStaff() {
			$this->expectOutputString('{"result":[{"UsersID":"5","UsersName":"pete","Staff":"1","Student":"1"}]}');
			
			$a = new Login();
			$a->login("pete","password");
		}
		
		public function testStudent() {
			$this->expectOutputString('{"result":[{"UsersID":"20","UsersName":"HarryStudent","Staff":"0","Student":"1"}]}');
			
			$a = new Login();
			$a->login("HarryStudent","password");
		}
		
		public function testIncorrect() {
			$this->expectOutputString('{"result":[]}');
			
			$a = new Login();
			$a->login("HarryStudent","notPassword");
		}
	}
?>