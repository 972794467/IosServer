<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$uid=$_GET['uid'];
	$tid=$_GET['tid'];
	$uname=$_GET['uname'];
	$content=$_GET['content'];
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='call new_message('.$uid.','.$tid.',"'.$uname.'","'.$content.'");';
	$result=$conDB->query($sql);
	if($result!=0){
		exit('SUCCESS');
	}else{
		exit('FAIL');
	}
	/*foreach($result as $k => $id){
		print_r($id);
		exit();		
	}
		exit('FAIL');
	*/
	
	