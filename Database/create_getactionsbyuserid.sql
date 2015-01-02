-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getactionsbyuserid`(IN iduser INT(11))
BEGIN
select ra.actionid ,a.actionname 
     from roleaction ra , action a 
     where ra.actionid=a.id
     and ra.roleid in (select  roleid from userrole where userid = iduser);
END