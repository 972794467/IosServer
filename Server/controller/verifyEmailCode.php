<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	
	$email=$_GET['email'];
	$code=$_GET['code'];
	$type=$_GET['type'];
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='select code from emails where email= "'.$email.'" and type ='.$type.';';
	$result=$conDB->querySingle($sql);
	if($result['code']==$code){
		exit('SUCCESS');
	}else{
		exit('FAIL');
	}
	