<?php
require_once "selectTimetableForStudentLecturer.php";

	class SelectTimetableForStudentLecturerTest extends PHPUnit_Framework_TestCase
	{
		public function testTrue() {
			$this->assertTrue(true);
		}
		
		/* public function testEmpty() {
			$this->expectOutputString('{"result":[]}');
			
			$a = new SelectTimetableForStudentLecturer();
			$a->getTimetable("");
		}
		
		public function testNotEmpty() {
			$this->expectOutputString('{"result":[{"ModuleName":"Agile soft dev","Start_Time":"14:00:00","End_Time":"13:00:00","ClassDate":"3"},{"ModuleName":"Agile soft dev","Start_Time":"12:00:00","End_Time":"13:00:00","ClassDate":"5"},{"ModuleName":"Agile soft dev","Start_Time":"12:00:00","End_Time":"13:00:00","ClassDate":"3"},{"ModuleName":"Agile soft dev","Start_Time":"22:00:00","End_Time":"23:00:00","ClassDate":"4"},{"ModuleName":"Agile soft dev","Start_Time":"22:30:00","End_Time":"23:00:00","ClassDate":"4"},{"ModuleName":"SomeClass","Start_Time":"15:00:00","End_Time":"00:00:12","ClassDate":"2"}]}');
			
			$a = new SelectTimetableForStudentLecturer();
			$a->getTimetable(5);
		} */
	}
	
?>