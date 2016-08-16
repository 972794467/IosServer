<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
		
	$email=$_GET['email'];
	$password=$_GET['password'];
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='select password from users where email = "'.$email.'";';
	$result=$conDB->querySingle($sql);
	if($password===$result['password']){
		$sql='select * from users where email ="'.$email.'";';
		$result=$conDB->querySingle($sql);
		$user['state']='SUCCESS';
		$user['id']=$result['id'];
		$user['name']=$result['name'];
		$user['type']=$result['type'];
		$user['udeclare']=$result['udeclare'];
		
		print_r(json_encode($user));		
		
	}
	else{
		exit('FAIL');
	}