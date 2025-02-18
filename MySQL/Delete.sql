USE `northwind`;
SELECT * FROM `employees`;
INSERT INTO `employees` 
	(EmployeeID, LastName, FirstName, BirthDate, Photo, Notes) 
VALUES 
	(50, 'LastName', 'FirstName', '1958-01-09 00:00:00', 'EmpID5.pic', 'Notes');
-- Hard Delete
DELETE FROM `employees` WHERE EmployeeID = 50;
-- Get all non-deleted employees
SELECT * FROM `employees` WHERE `deleted_at` IS NULL;
-- get all deleted employees
SELECT * FROM `employees` WHERE `deleted_at` IS NOT NULL;
-- Soft Delete
UPDATE `employees` SET `deleted_at` = NOW() WHERE EmployeeID = 50;