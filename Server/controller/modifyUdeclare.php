<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
		
	$id=$_GET['id'];
	$udeclare=$_GET['udeclare'];
	$password=$_GET['password'];
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='select password from users where id = "'.$id.'";';
	$result=$conDB->querySingle($sql);
	if($password===$result['password']){
		$sql='call modify_udeclare('.$id.',"'.$udeclare.'");';
		$result=$conDB->query($sql);
		if($result==1){
			exit('SUCCESS');
		}
		else{
			exit('FAIL');
		}
	}
	else{
		exit('FAIL');
	}