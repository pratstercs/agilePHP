<?php

class Login {
	public function __construct() {

		}
		
	public function login($UsersName, $UserPassword) {
				$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
				mysql_select_db('agile');
				
			$res = mysql_query('SELECT 
									*
								FROM 
									user
								WHERE user.UsersName ="' . $UsersName . '" && user.UserPassword = "' . $UserPassword . '";',$db); 
			$result = array();
			 
			while($row = mysql_fetch_array($res)){
			array_push($result,
			array('UsersID'=>$row[0],
			'UsersName'=>$row[1],
			//'UserPassword'=>$row[2],
			'Staff'=>$row[3],
			'Student'=>$row[4]
			));
			}
			 
			echo json_encode(array("result"=>$result));

			mysql_close($db);
	}
}

$a = new Login();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$UsersName = $obj['UsersName'];
$UserPassword = $obj['UserPassword'];

$a->login($UsersName, $UserPassword);
 
?>