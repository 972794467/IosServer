<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
		
	$id=$_GET['id'];
	$name=$_GET['name'];
	$password=$_GET['password'];
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='select password from users where id = "'.$id.'";';
	$result=$conDB->querySingle($sql);
	if($password===$result['password']){
		$sql='call modify_name('.$id.',"'.$name.'");';
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