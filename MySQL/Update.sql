USE `classicmodels`;
SELECT * FROM `customers`;
SELECT * FROM `employees`;
SELECT * FROM `offices`;
-- Update records
UPDATE `customers` SET `phone` = '05-98 5555' 
WHERE `customerNumber` = 121;
UPDATE `customers` SET `addressLine1` = '1 Syria Street - Deep Mall', `city` = 'Alexandria', `country` = 'Egypt', `postalCode` = '12345'  
WHERE `customerNumber` = 121;
-- Add records
INSERT INTO `offices` (`officeCode`, `city`, `phone`, `addressLine1`, `addressLine2`, `state`, `country`, `postalCode`, `territory`) 
VALUES (201, 'Alexandria', '123456789', '1 Syria street - Deep Mall', '', 'Roushdy', 'Egypt', 12345, '');
-- update the office code for all employees in officeCode 1,2,3 to be 8
UPDATE 
	`employees` 
SET
	`officeCode` = (SELECT `officeCode` FROM `offices` WHERE `city` = 'Alexandria') 
WHERE 
	`officeCode` IN (SELECT `officeCode` FROM `offices` WHERE `country` = 'USA');



