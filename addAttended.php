<?php
	class AddAttended {
		public function __construct() {

		}
		
		public function addAttended($classID, $studentID) {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');
			

			mysql_query('CALL insertAttended('.$classID.','.$studentID.')',$db);

			mysql_close($db);
		}
	}

	$a = new AddAttended();

	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	$classID = $obj['ClassID'];
	$studentID = $obj['StudentID'];

	$a->addAttended($classID, $studentID);
?>