<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	require_once('../lib/email.class.php');
  
	$email=$_GET['email'];  
	$type=$_GET['type'];
	if(preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i',$email)==false){
		exit('INVALID');
	}else
	{
		$conDB = new ConnectDatabase(DATABASE_DBNAME);
		if($type==0){
		$sql='select * from emails where email="'.$email.'";';
		$result=$conDB->querySingle($sql);
		if($result!=0){
			exit('EXIST');
		}
		}
		$code=rand(10000,99999);
				
		$smtpserver = "smtp.163.com";//SMTP服务器
		$smtpserverport =25;//SMTP服务器端口
		$smtpusermail = "15129382767@163.com";//SMTP服务器的用户邮箱
		$smtpemailto = $email;//发送给谁
		$smtpuser = "15129382767";//SMTP服务器的用户帐号
		$smtppass = "LT521999";//SMTP服务器的用户密码
		$mailtitle = '验证邮件';//邮件主题
		$mailcontent = '您的验证码为：'.$code;//邮件内容
		$mailtype = "TXT";//邮件格式（HTML/TXT）,TXT为文本邮件		
		$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = false;//是否显示发送的调试信息
		$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

		if($state==""){
		exit('FAIL');
		}		
		
		$sql='insert into emails values("'.$email.'", '.$code.','.$type.');';
		$conDB->query($sql);
		exit('SUCCESS');				
	};   
	 