<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
		
	$uid=$_GET['uid'];
	$uname=$_GET['uname'];
	$type=$_GET['type'];
	
	
	$conDB = new ConnectDatabase(DATABASE_DBNAME);
	$sql='LOCK TABLES unreadmessages WRITE;';
	$conDB->query($sql);
	$sql='select * from unreadmessages where tid = "'.$uid.'";';
	$result=$conDB->queryMultiple($sql);
	$sql='UNLOCK TABLES;';
	$conDB->query($sql);
	$sql='call delete_unReadMessages('.$uid.');';
	$conDB->query($sql);
	$sql='insert into online(uid,uname,type) values('.$uid.',"'.$uname.'",'.$type.') 
	ON DUPLICATE KEY UPDATE ltime=current_timestamp();';
	$conDB->query($sql);
	if($result==0){
		exit('NULL');
	}
	print_r(json_encode($result));
	
	
	