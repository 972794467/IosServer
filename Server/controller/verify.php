<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
    $id=$_GET['id'];
	$password=$_GET['password'];
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='select password from users where id = "'.$id.'";';
	$result=$conDB->querySingle($sql);
	if($password!=$result['password']){
		exit('FAIL');	
		
	}
	
?>