<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$email=$_GET['email'];
	$name=$_GET['name'];
	$password=$_GET['password'];
	$type=$_GET['type'];
	$udeclare=$_GET['udeclare'];
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='call register_user("'.$email.'","'.$name.'","'.$password.'",'.$type.',"'.$udeclare.'");';
	$result=$conDB->query($sql);

	if($result==1){
		exit('SUCCESS');	
	}else{
		exit('FAIL');
	}
	
	