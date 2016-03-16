<?php
class SelectTimetableForStudent {
	public function __construct() {

	}
	public function getTimetable($UserID) {
		$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
		mysql_select_db('agile');

		$res = mysql_query('SELECT 
			module.ModuleName, class.Start_Time, class.End_Time, dayofweek(ClassDate)
		FROM 
			class
		INNER JOIN module
		ON module.ModuleID=class.ModuleID
		INNER JOIN enrolement
		ON enrolement.ModuleID=module.ModuleID
		WHERE enrolement.StudentID = 
		( 	SELECT
					student.StudentID
				FROM
					student
				WHERE
					student.UserID =
							(	SELECT
									user.UserID
								FROM
									user
								WHERE
									user.UserID=' . $UserID . '&& 
					class.ClassDate>= DATE_ADD(current_date(), INTERVAL(1-DAYOFWEEK(current_date())) +1 DAY) && 
									class.ClassDate <= DATE_ADD(current_date(), INTERVAL(7-DAYOFWEEK(current_date()))-1 DAY)));',$db); 
		$result = array();
		 
		while($row = mysql_fetch_array($res)){
		array_push($result,
		array('ModuleName'=>$row[0],
		'Start_Time'=>$row[1],
		'End_Time'=>$row[2],
		'ClassDate'=>$row[3]
		));
		}
		 
		mysql_close($db);

		return json_encode(array("result"=>$result));
	}
}

$a = new SelectTimetableForStudent();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$UserID = $obj['UserID'];

echo $a->getTimetable($UserID);
?>