<?php
$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	$UserID = $obj['UserID'];

	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

$res = mysql_query('SELECT 
						module.ModuleName, class.Start_Time, class.End_Time, dayofweek(ClassDate)
					FROM 
						module
					INNER JOIN class
					ON module.ModuleID=class.ModuleID
					WHERE class.LecturerID = 
						( 	SELECT
								lecturer.LecturerID
							FROM
								lecturer
							WHERE
								lecturer.StaffID = 
								( 	SELECT 
										staff.StaffID
									FROM
										staff
									WHERE
										staff.UserID =
									(	SELECT
											user.UserID
										FROM
											user
										WHERE
											user.UserID=' . $UserID . '&& 
							class.ClassDate>= DATE_ADD(current_date(), INTERVAL(1-DAYOFWEEK(current_date())) +1 DAY) && 
											class.ClassDate <= DATE_ADD(current_date(), INTERVAL(7-DAYOFWEEK(current_date()))-1 DAY))) );',$db); 
$result = array();
 
while($row = mysql_fetch_array($res)){
array_push($result,
array('ModuleName'=>$row[0],
'Start_Time'=>$row[1],
'End_Time'=>$row[2],
'ClassDate'=>$row[3]
));
}
 
echo json_encode(array("result"=>$result));

mysql_close($db);

 
?>