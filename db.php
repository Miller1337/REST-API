<?php
$user = "root";
$password = "12345";
try{
	$db = new PDO ("mysql:host=localhost;dbname=tkp2", $user,$password);
}catch (Exception $e){
	echo $e->getMessage();
	
}
