<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
		
	//$uid=$_GET['uid'];
		
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='select * from online;';
	$result=$conDB->queryMultiple($sql);
	if($result==0){
		exit('NULL');
	}
	print_r(json_encode($result));
	
	