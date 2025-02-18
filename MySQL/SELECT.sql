-- SECTION 1 -----------------------------
-- activate classicmodels database
USE `classicmodels`;
-- get a list of all employees
SELECT * FROM `employees`;
-- get all data of employees jop Sales Rep
SELECT * FROM `employees` WHERE `jobTitle` = 'Sales Rep';
-- get only customer Name and phone and city and country from customers
SELECT * FROM `customers`;
-- TASK 1 -----------------------------
-- get a list of all orders
SELECT * FROM `orders`;
-- get a list of all customers
SELECT * FROM `customers`;
-- get only employees first names, last names, and job titles
SELECT `firstName`, `lastName`, `jobTitle` FROM `employees`;
-- get a list of all customers in USA
SELECT * FROM `customers` WHERE `country` = 'USA';
-- ---------------------------------------------------------------------------------------
-- SECTION 2 -----------------------------
-- Activate a Database
USE `classicmodels`;
-- get all data from a table (employees)
SELECT * FROM `employees`;
-- get only sales rep staff
SELECT * FROM `employees` WHERE `jobTitle` = 'Sales Rep';
-- DO calculations
SELECT 5+5;
-- use aliases
SELECT 5+5 AS 'Total';
-- get frist name and last name from employees
SELECT `firstName` AS `First Name`, `lastName` AS `Sur Name` FROM `employees`;
-- MySQL Functions (concat)
SELECT concat(`firstName`, ' ', `lastName`) AS 'Full Name' FROM `employees`;
-- get the full name and job title from employees table
SELECT concat(`firstName`, ' ', `lastName`) AS 'Full Name',`jobTitle` AS 'Job' FROM `employees`;
-- get the full name and job title from employees table sorted by full name
SELECT concat(`firstName`, ' ', `lastName`) AS 'Full Name',`jobTitle` AS 'Job' FROM `employees` ORDER BY 'Full Name';
-- get all payments from high to low
SELECT * FROM `payments` ORDER BY `amount` DESC;
-- get a list of all job titles in the company
SELECT DISTINCT `jobTitle` FROM `employees` ORDER BY `jobTitle`;
-- Get a list of all customers' countries 
SELECT DISTINCT `country` FROM `customers` ORDER BY `country` ;
-- Get all employees from office code 1 and 5 only
SELECT * FROM `employees` WHERE `officeCode` IN(1,5);
-- Get all sales rep staff and employees in office 1
SELECT * FROM `employees` WHERE `officeCode` = 1 AND `jobTitle` = 'Sales Rep';
-- get all orders ordered by status as follow(Shipped, Resolved, In Process, On Hold, Cancelled, Disputed)
SELECT * FROM `orders` ORDER BY FIELD(`status`, 'Shipped', 'Resolved', 'In Process', 'On Hold', 'Cancelled', 'Disputed');
-- get a list of all payments over 100000
SELECT * FROM `payments` WHERE `amount` > 10000;
-- get a list of all payments between 50000 and 70000
SELECT * FROM `payments` WHERE `amount` >= 50000 AND `amount` <= 70000 ; 
SELECT * FROM `payments` WHERE `amount` BETWEEN 50000 AND 70000;
-- Get all sales team
SELECT * FROM `employees` WHERE `jobTitle` LIKE '%Sale%'; -- (%) means -> any number of charcters starting from 0 to infinite
-- find an employee with extension ends with 1
SELECT * FROM `employees` WHERE `extension` LIKE '%1';
-- find an employee with extension starts with 1
SELECT * FROM `employees` WHERE `extension` LIKE 'X1%';
-- find an employee with extension starts with 1 and ends with 2
SELECT * FROM `employees` WHERE `extension` LIKE 'X1%2';
-- find a customer in state starts with (N) and has another 2 charachters
SELECT * FROM `customers` WHERE `state` LIKE 'N__';
-- Get all products that there code start with S18
SELECT * FROM `products` WHERE `productCode` LIKE 'S18%';
-- Get all customers from a state of two letters starting with (c)
SELECT * FROM `customers` WHERE `state` LIKE 'C_';
-- Get all customers with no sales Rep associate
SELECT * FROM `customers` WHERE `salesRepEmployeeNumber` IS NULL;
-- Get all customers with sales Rep associate
SELECT * FROM `customers` WHERE `salesRepEmployeeNumber` IS NOT NULL;
-- Get the highes 3 orders;
SELECT * FROM `orders` ORDER BY `orderDate` DESC LIMIT 3;
-- Get only 10 customers
SELECT * FROM `customers` LIMIT 10;
-- get only 10 customers from number 21
SELECT * FROM `customers` WHERE `customerNumber` >= 21 LIMIT 10;
-- TASK 2 -----------------------------
-- Get all cancelled orders in 2004
SELECT * FROM `orders` WHERE `status` = 'Cancelled' AND `requiredDate` LIKE '2004%';
-- Get all sales rep and Sale Managers staff 
SELECT * FROM `employees` WHERE `jobTitle` LIKE 'Sale%';
-- get a list of all (Classic Cars, Ships, Trucks and Buses) products, sorted as follow(Trucks and Buses, Classic Cars, Ships)
SELECT * FROM `products` WHERE `productLine` IN('Classic Cars', 'Ships', 'Trucks and Buses') ORDER BY FIELD(`productLine`,'Trucks and Buses', 'Classic Cars', 'Ships');
-- get all sales rep in office 2
SELECT * FROM `employees` WHERE `jobTitle` = 'Sales Rep' AND `officeCode` = 2;
-- list all companies that names end with (Inc.) or (co.)
SELECT * FROM `customers` WHERE `customerName` LIKE '%INC' OR `customerName` LIKE '%CO';
-- ---------------------------------------------------------------------------------------
-- SECTION 3 -----------------------------
-- MySQL Functions
SELECT 
	YEAR('2000-05-08 10:15:22') AS `Year`,
    MONTH('2000-05-08 10:15:22') AS `Month`,
    DAY('2000-05-08 10:15:22') AS `Day`,
    HOUR('2000-05-08 10:15:22') AS `Hour`,
    Minute('2000-05-08 10:15:22') AS `Minute`,
    SECOND('2000-05-08 10:15:22') AS `Second`
    ;
-- get a list of all employees numbers, first and last names and add a new column named (type) with text (Staff)
SELECT `employeeNumber`, `firstName`, `lastName`, 'Staff' AS `Type` FROM `employees`;
-- Get all employees and full name
SELECT *, CONCAT(`firstName`, ' ' , `lastName`) AS `Full Name` FROM `employees`;
-- Get only customer number, name, city, and country sorted by country from Z to A and city from A to Z
SELECT `customerNumber`, `customerName`, `city`, `country` FROM `customers` ORDER BY `country` DESC, `city`;
-- Get a list of all (customers, suppliers, shippers) only (name, and phone) IN ONE TABLE {add to each record the contact type)
USE `northwind`;
SELECT `CustomerName` AS `Contact Name`, `phone` AS `Contact Phone`, 'Customer' AS `Contact Type` FROM `customers` 
UNION
SELECT `SupplierName`, `phone`, 'Supplier'  FROM `suppliers` 
UNION
SELECT `ShipperName`, `Phone`, 'Shipper' FROM `Shippers`;
-- Get a list of all mangers and non-managers staff (Add a new column (level) as [H-Level, L-Level])
USE `classicmodels`;
SELECT *, 'H-Level' AS `Level` FROM `employees` WHERE `jobTitle` != 'Sales Rep'
UNION
SELECT *, 'L-Level'   FROM `employees` WHERE `jobTitle` = 'Sales Rep';
SELECT *, IF (  `jobTitle` =  'Sales Rep'   ,    "L_level"   ,    "H_level"    ) AS `Level` FROM `employees`;
-- count all employees
SELECT COUNT(*) AS `Total Employees` FROM `employees`;
-- get the total payments
SELECT SUM(amount) FROM `payments`;
-- get the total payments for each customer
SELECT `customerNumber`, SUM(amount) AS `Total Payments` FROM `payments` GROUP BY `customerNumber`;
-- Get the number of paymetns for each customer
SELECT `customerNumber`, COUNT(*) FROM `payments` GROUP BY `customerNumber`;
-- Get the number of paymetns for customers 148, 115
SELECT `customerNumber`, COUNT(*) AS `Number of Payments` FROM `payments` WHERE `customerNumber` IN(148,103) GROUP BY `customerNumber` ;
-- Get the average payment per customer
SELECT `customerNumber`, ROUND(AVG(`amount`), 2) AS `Payment Average` FROM `payments` GROUP BY `customerNumber`;
-- Cross join
SELECT * FROM `customers` CROSS JOIN `employees`;
SELECT * FROM `customers` JOIN `employees`;
-- Inner join
SELECT * FROM `employees` INNER JOIN `offices` ON `employees`.`officeCode` = `offices`.`officeCode`;
SELECT * FROM `employees` JOIN `offices` ON `employees`.`officeCode` = `offices`.`officeCode`;
-- TASK 3 -----------------------------
-- Get a list of all customers sorted by loialty as follow:
/*
200000+ Platinum
100000+ Gold
50000+ Sliver
<50000 Bronze
*/
SELECT *,'Platinum' `loialty` FROM `customers` WHERE `creditLimit` >= 200000
UNION
SELECT *,'Gold' `loialty` FROM `customers` WHERE `creditLimit` < 200000 AND `creditLimit` >= 100000
UNION
SELECT *,'Sliver' `loialty` FROM `customers` WHERE `creditLimit` < 100000 AND `creditLimit` >= 50000
UNION
SELECT *,'Bronze' `loialty` FROM `customers` WHERE `creditLimit` < 50000;
-- From the Northwind Database, Get a list of all products (NOTE: include the product category details)
USE `Northwind`;
SELECT * FROM `products` JOIN `categories` ON `products`.`CategoryID`=`categories`.`CategoryID`;
-- ---------------------------------------------------------------------------------------
-- SECTION 4 -----------------------------
-- From the Northwind Database, Get a list of all products (NOTE: include the product category details and supplier information)
use `northwind`;
select * 
from `products` 
	INNER join `suppliers` 
		on `suppliers`.`SupplierID`=`products`.`SupplierID` 
	INNER join `categories` 
		on `categories`.`CategoryID`=`products`.`CategoryID`;
-- customers without account manager
USE `classicmodels`;
SELECT * FROM `customers` WHERE `salesRepEmployeeNumber` IS NULL;
-- customers with account manager
SELECT * FROM `customers` WHERE `salesRepEmployeeNumber` IS NOT NULL;
-- SELECT * customers (including account manager)
SELECT * FROM `customers` LEFT OUTER JOIN `employees` ON `employees`.`employeeNumber` = `customers`.`salesRepEmployeeNumber`;
SELECT * FROM `employees` RIGHT OUTER JOIN `customers` ON `employees`.`employeeNumber` = `customers`.`salesRepEmployeeNumber`;
SELECT * FROM `employees` LEFT OUTER JOIN `customers` ON `employees`.`employeeNumber` = `customers`.`salesRepEmployeeNumber` ORDER BY `employeeNumber`;
-- Remove optional keywords
-- From the Northwind Database, Get a list of all products (NOTE: include the product category details and supplier information)
use `northwind`;
select * 
from `products` `p`
	join `suppliers` `s`
		on `s`.`SupplierID` = `p`.`SupplierID` 
	join `categories` `c`
		on `c`.`CategoryID`=`p`.`CategoryID`;
-- ---------------------------------------
USE `classicmodels`;
-- customers without account manager
SELECT * FROM `customers` WHERE `salesRepEmployeeNumber` IS NULL;
-- customers with account manager
SELECT * FROM `customers` WHERE `salesRepEmployeeNumber` IS NOT NULL;
-- SELECT * customers (including account manager)
SELECT * FROM `customers` `c` LEFT JOIN `employees` `e` ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`;
SELECT * FROM `employees` `e` RIGHT JOIN `customers` `c` ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`;
SELECT * FROM `employees` `e` LEFT JOIN `customers` `c` ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber` ORDER BY `employeeNumber`;
-- SELECT * employees with managers' details
SELECT * from `employees` LEFT JOIN `employees` `managers` ON `employees`.`reportsTo` = `managers`.`employeeNumber`;
SELECT * from `employees` `e` LEFT JOIN `employees` `m` ON `e`.`reportsTo` = `m`.`employeeNumber`;
-- SELECT employees full names and with managers' full names as well as ids
SELECT 
	`e`.`employeeNumber` `Employee ID`,
    CONCAT(`e`.`firstName`, ' ' , `e`.`lastName`) `Employee Name`,
    `e`.`reportsTo`,
    `m`.`employeeNumber` `Manager ID`, 
    CONCAT(`m`.`firstName`, ' ', `m`.`lastName`) `Manager Name` 
from 
	`employees` `e` 
LEFT JOIN 
	`employees` `m` ON `e`.`reportsTo` = `m`.`employeeNumber`;
-- get all customers' payments with total for each customer, as well as grand-total payments
USE `classicmodels`;
SELECT `customerNumber`, SUM(`amount`) FROM `payments` GROUP BY `customerNumber` WITH ROLLUP;
SELECT `customerNumber`, YEAR(`paymentDate`), SUM(`amount`) FROM payments GROUP BY `customerNumber`, YEAR(`paymentDate`) WITH ROLLUP;
SELECT YEAR(`paymentDate`), `customerNumber`,  SUM(`amount`) FROM payments GROUP BY YEAR(`paymentDate`), `customerNumber` WITH ROLLUP;
SELECT YEAR(`paymentDate`) `Year`, SUM(`amount`) `Total` FROM payments GROUP BY `Year` WITH ROLLUP;
SELECT `orderNumber`, SUM(`quantityOrdered` * `priceEach`) `total` FROM `orderdetails` GROUP BY `orderNumber` HAVING `total` >= 50000;
-- ---------------------------------------------------------------------------------------
-- SECTION 5 -----------------------------
USE `classicmodels`;
SELECT `officeCode` FROM `offices` WHERE `country` IN ('USA', 'UK', 'Japan');
SELECT * FROM `employees` WHERE `officeCode` IN (1,2,3,5,7);
SELECT * FROM `offices` `o` JOIN `employees` `e` ON `o`.`officeCode` = `e`.`officeCode` WHERE `country` IN ('USA', 'UK', 'Japan');
-- Sub Query
SELECT * FROM `employees` WHERE `officeCode` IN (
	SELECT `officeCode` FROM `offices` WHERE `country` IN ('USA', 'UK', 'Japan')
);
SELECT * FROM `employees` `e` JOIN `offices` `o` ON `o`.`officeCode` = `e`.`officeCode` WHERE `e`.`officeCode` IN (
	SELECT `officeCode` FROM `offices` WHERE `country` IN ('USA', 'UK', 'Japan')
);
-- get the highest payment amount
-- using JOIN
SELECT * FROM `payments`;
SELECT * FROM `payments` `p` JOIN `customers` `c` ON `c`.`customerNumber` = `p`.`customerNumber` ORDER BY `amount` DESC LIMIT 1;
-- using SUBQUERY
SELECT MAX(`amount`) FROM `payments`;
SELECT `customerNumber` FROM `payments` WHERE `amount` = (SELECT MAX(`amount`) FROM `payments`);
SELECT * FROM `customers` WHERE `customerNumber` = (SELECT `customerNumber` FROM `payments` WHERE `amount` = (SELECT MAX(`amount`) FROM `payments`));
-- Get all payments above the average payment
SELECT AVG(`amount`) FROM `payments`;
SELECT * FROM `payments` WHERE `amount` > (SELECT AVG(`amount`) FROM `payments`) ORDER BY `amount`;
