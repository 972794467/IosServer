
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `register_user`(email_v varchar(32), name_v varchar(16), password_v varchar(32),type_v TINYINT UNSIGNED,udeclare_v VARCHAR(60))
BEGIN

insert into users(email, name, password,type,udeclare) values(email_v, name_v, password_v,type_v,udeclare_v);

END //
DELIMITER ;


DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `modify_name`(id_v INT unsigned, name_v varchar(16))
BEGIN

update users set name = name_v where id = id_v;

END //
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `modify_udeclare`(id_v INT unsigned, udeclare_v varchar(60))
BEGIN

update users set udeclare = udeclare_v where  id = id_v;

END //
DELIMITER ;


DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `modify_password`(email_v varchar(32), password_v varchar(32))
BEGIN

update users set password = password_v where email=email_v;

END //
DELIMITER ;


DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `new_unReadMessages`(uid_v INT unsigned, tid_v INT unsigned,uname_v VARCHAR(16) ,utype_v TINYINT UNSIGNED, type_v varchar(8), content_v varchar(526)) 
BEGIN

insert into unreadmessages(uid, tid, uname,utype,type,content) value(uid_v, tid_v, uname_v,utype,type_v,content_v);


end //
DELIMITER ;
/*
返回插入id。

DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `new_unReadMessages`(uid_v INT unsigned, tid_v INT unsigned,uname_v VARCHAR(16) ,utype_v TINYINT UNSIGNED, type_v varchar(8), content_v varchar(526)) RETURNS INT unsigned
BEGIN

insert into unreadmessages(uid, tid, uname,utype,type,content) value(uid_v, tid_v, uname_v,utype,type_v,content_v);
return LAST_INSERT_ID();

end //
DELIMITER ;
*/




/*
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_unReadMessages`(tid_v INT unsigned)
BEGIN


insert into messages select * from unreadmessages where unreadmessages.tid=tid_v;

delete from unreadmessages where tid = tid_v;



END //
DELIMITER ;
*/