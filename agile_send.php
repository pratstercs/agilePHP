<?php
	class AgileSend {
		public function __construct() {

		}
		
		public function send($UsersName) {
			try 
			{
			    $bdd = new PDO('mysql:host=philippratt.co.uk;dbname=agile;charset=utf8', 'agile', 'agile');
			} catch (Exception $e) 
			{
			    die('Error : '.$e->getMessage());
			}

			$sql = $bdd->prepare(
			'INSERT INTO user (UsersName) 
			VALUES (:UsersName)');
			if (!empty($UsersName)) {
			    $sql->execute(array(
			        'UsersName' => $UsersName));
			}
		}
	}
			//insert into user (UsersName) VALUES ("HarryTest");

$a = new AgileSend();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$UsersName = $obj['UsersName'];

$a->send($UsersName);

?>