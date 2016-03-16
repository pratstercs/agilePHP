<?php
	class SelectStudentID {
		public function __construct() {

		}
		public function selectStudentID() {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			$studQuery = "select StudentID from student";
			
			$studResult = mysql_query($studQuery,$db);

			mysql_close();
			
			$result = array();

			while($row = mysql_fetch_array($studResult)){
				array_push($result, $row['StudentID']);
			}
			
			return json_encode($result);
		}
	}

$a = new SelectStudentID();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

echo $a->selectStudentID();

?>