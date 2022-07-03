<?php
function getAllModels ($db)
{
	$sql="SELECT * FROM modellist
	LEFT JOIN licensekategory ON modellist.drivelicense = licensekategory.idlicenseKategory ;";
	$result = array();
	$stmt=$db-> prepare($sql);
	//echo"<pre>";	 print_r($query);	 echo"</pre>";
	 $stmt -> execute();
	 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['idmodels']] = $row;
	}
	return $result;
}
/*function getAllNM ($db)
{
	$sql = "SELECT*FROM models";
	$res = array();

	$stmt=$db-> prepare($sql);
	//echo"<pre>";	 print_r($query);	 echo"</pre>";
	 $stmt -> execute();
	 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$res[$row['model']] = $row;
	 	$res[$row['year']] = $row;
	}
	return $res;
}*/
function addModels ($db, $model,$year,$drivelicense)
{
	$sql = "INSERT INTO modellist(model,year,drivelicense)
		VALUES(:model, :year, :lic)";
	$stmt=$db-> prepare($sql);
	 $stmt -> bindValue(':model',$model, PDO::PARAM_STR);
	 $stmt -> bindValue(':year',$year, PDO::PARAM_INT);
	 $stmt -> bindValue(':lic',$drivelicense, PDO::PARAM_INT);
	 $stmt -> execute();
}
function addUser ($db,$user,$password)
{
	$sql = "INSERT INTO userlist(name,password)
		VALUES(:name, :pass, )";
	 $stmt = $db-> prepare($sql);
	 $stmt -> bindValue(':name',$name, PDO::PARAM_STR);
	 $stmt -> bindValue(':pass',$password, PDO::PARAM_STR);
	 $stmt -> execute();
}
function dropDb ($db)
{
	$sql = "DROP TABLE `tkp2`.`dr`";

	$stmt = $db -> prepare($sql);
	$stmt ->execute();
}
function deleteModels ($db,$id)
{
	$sql = "DELETE FROM modellist WHERE idmodels = :idmodels";

	$stmt = $db -> prepare($sql);
	$stmt->bindValue(":idmodels",$id, PDO::PARAM_INT);
	$stmt ->execute();
}
function getModelById($db,$id)
{
	$sql = "SELECT * FROM  modellist WHERE idmodels = :idmodels";
	$stmt = $db -> prepare ($sql);
	$stmt->bindValue('idmodels',$id, PDO::PARAM_INT);
	$stmt ->execute();
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	return $row;
}
function saveModel ($db,$model,$id,$year)
{
	$sql ="UPDATE modellist
	SET model =: model
	WHERE idmodels =: idmodels ";
	$stmt = $db -> prepare ($sql);
	$stmt->bindValue('model',$model, PDO::PARAM_STR);
	$stmt->bindValue('year',$year, PDO::PARAM_INT);
	$stmt->bindValue('idmodels',$id, PDO::PARAM_INT);
	$stmt ->execute();
}
function getLicense ($db)

{
	$sql="SELECT * FROM licensekategory";
	$res = array();
	$stmt=$db-> prepare($sql);
	//echo"<pre>";	 print_r($query);	 echo"</pre>";
	 $stmt -> execute();
	 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$res[$row['idlicenseKategory']] = $row;
	}
	return $res;
}
function User ($db, $name, $password){
	$sql = "SELECT name , password FROM userlist WHERE name = :login AND password = :password ";
	$stmt = $db -> prepare ($sql);
	$stmt->bindValue(':login',$name, PDO::PARAM_STR);
	$stmt->bindValue(':password',$password, PDO::PARAM_STR);
	$stmt ->execute;
	$row = $stmt->fetch (PDO::FETCH_ASSOC);
	if (!empty(row)) {
		return true;
	} else
	{
		return false;
	}
}