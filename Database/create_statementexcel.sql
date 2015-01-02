DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `statementexcel`( IN varyear int(4) ,IN varmonth int(2),IN towerid int (11))
BEGIN
-- Payment
Select 
p.paymentdate as processdate,
p.paymentmethod as paymentmethod,
p.depositor as depositor,
p.amount as credit,
'' as debit,
(select number from apartment where id = p.apartmentid  and towerid =towerid limit 1 )as apartment,
(select id from paymentinvoice where paymentid= p.id limit 1) as invoicenumber,
p.description as description
from payment p
Inner join apartment a ON a.id =p.apartmentid and a.towerid =towerid
where year(p.paymentdate)=varyear and month(p.paymentdate)=varmonth
UNION
-- Income 
Select 
i.incomedate as processdate,
i.paymentmethod as paymentmethod,
i.depositor as depositor,
i.amount as credit,
'' as debit,
'' as apartment,
'' as invoicenumber,
i.description as description
from income i
where year(i.incomedate)=varyear and month(i.incomedate)=varmonth and i.towerid =towerid

UNION
-- Expense
Select 
e.expensedate as processdate,
e.paymentmethod  as paymentmethod,
(select name from provider where providerid =e.providerid limit 1) as depositor,
'' as credit,
e.amount as debit,
'' as apartment,
'' as invoicenumber,
e.description as description
from expense e
where year(e.expensedate)=varyear and month(e.expensedate)=varmonth and e.towerid=towerid;

END$$
DELIMITER ;
