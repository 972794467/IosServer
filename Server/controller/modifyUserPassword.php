<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
		
	$email=$_GET['email'];
	$newPassword=$_GET['newPassword'];
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='call modify_password("'.$email.'","'.$newPassword.'");';
	$result=$conDB->query($sql);
	if($result==1){
		exit('SUCCESS');
	}
	else{
		exit('FAIL');
	}
	