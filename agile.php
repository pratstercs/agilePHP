<?php
define('HOST','philippratt.co.uk');
define('USER','agile');
define('PASS','agile');
define('DB','agile');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$sql = "SELECT 
			module.ModuleName, class.Start_Time, class.End_Time
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
								user.UserID=6)) );";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('id'=>$row[0],
'name'=>$row[1],
'address'=>$row[2]
));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>