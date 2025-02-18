
-- DROP DATABASE `School`;
CREATE DATABASE IF NOT EXISTS `School`;
USE `School`;

CREATE TABLE IF NOT EXISTS `sol_teachers` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `First_Name` VARCHAR(15) NOT NULL,
  `Last_Name` VARCHAR(15) NOT NULL,
  `Gender` ENUM('Male','Female') NOT NULL,
  `n_ID` VARCHAR(14) UNIQUE NOT NULL,
  `Phone_Number` VARCHAR(11) UNIQUE NOT NULL,
  `Email` VARCHAR(50) UNIQUE NOT NULL,
  `Additional_Info` TEXT NOT NULL,
  `Hire_Date` DATE NOT NULL,
  `City` VARCHAR(20) NOT NULL,
  `State` VARCHAR(20),
  `Street` VARCHAR(20),
  `Postal_Code` VARCHAR(10),
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `sol_grades` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Name` VARCHAR(10),
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_department` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Name` VARCHAR(15) NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_subjects` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Name` VARCHAR(15) NOT NULL,
  `Code` VARCHAR(5) UNIQUE NOT NULL,
  `Department_ID` INT NOT NULL,
  `Description` TEXT NOT NULL,
  `Grade_Level_ID` INT NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `sol_subjects_Department_ID_foreign` FOREIGN KEY (`Department_ID`) REFERENCES `sol_department`(`ID`),
  CONSTRAINT `sol_subjects_Grade_Level_ID_foreign` FOREIGN KEY (`Grade_Level_ID`) REFERENCES `sol_grades`(`ID`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `sol_parents` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `First_Name` VARCHAR(15) NOT NULL,
  `Last_Name` VARCHAR(15) NOT NULL,
  `Gender` ENUM('Male','Female') NOT NULL,
  `n_ID` VARCHAR(14) UNIQUE NOT NULL,
  `Phone_Number` VARCHAR(11) NOT NULL,
  `Email` VARCHAR(50),
  `Information` TEXT,
  `City` VARCHAR(20) NOT NULL,
  `State` VARCHAR(20),
  `Street` VARCHAR(20),
  `Postal_Code` VARCHAR(5),
  `Relationship` ENUM('Father','Mother','Guardian') NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_buildings` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Name` VARCHAR(50) NOT NULL,
  `Location` TEXT,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_class` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Name` VARCHAR(10) NOT NULL,
  `Building_ID` INT NOT NULL,
  `Grade_Level_ID` INT NOT NULL,
  `Capacity` INT NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `sol_class_Building_ID_foreign` FOREIGN KEY (`Building_ID`) REFERENCES `sol_buildings`(`ID`),
  CONSTRAINT `sol_class_Grade_Level_ID_foreign` FOREIGN KEY (`Grade_Level_ID`) REFERENCES `sol_grades`(`ID`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `sol_student` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `First_Name` VARCHAR(15) NOT NULL,
  `Last_Name` VARCHAR(15) NOT NULL,
  `Gender` ENUM('Male','Female') NOT NULL,
  `n_ID` VARCHAR(14) UNIQUE NOT NULL,
  `Phone_Number` VARCHAR(11),
  `Email` VARCHAR(50),
  `Date_Of_Birth` DATE NOT NULL,
  `Information` TEXT,
  `City` VARCHAR(20) NOT NULL,
  `State` VARCHAR(20),
  `Street` VARCHAR(20),
  `Postal_Code` VARCHAR(5),
  `Class_ID` INT NOT NULL,
  `Parents_ID` INT NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `sol_student_Class_ID_foreign` FOREIGN KEY (`Class_ID`) REFERENCES `sol_class`(`ID`),
  CONSTRAINT `sol_student_Parents_ID_foreign` FOREIGN KEY (`Parents_ID`) REFERENCES `sol_parents`(`ID`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `sol_semester` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Name` VARCHAR(20) NOT NULL,
  `Start` DATE NOT NULL,
  `End` DATE NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `chk_dates_valid` CHECK (`Start` < `End`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_teacher_subjects` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Teacher_ID` INT NOT NULL,
  `Subject_ID` INT NOT NULL,
  `Grade_Level_ID` INT NOT NULL,
  `Semester_ID` INT NOT NULL,
  `Teacher_role` ENUM('principal','assistant') NOT NULL,
  `Weekly_Hours` INT NOT NULL,
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `sol_teacher_subjects_Teacher_ID_foreign` FOREIGN KEY (`Teacher_ID`) REFERENCES `sol_teachers`(`ID`),
  CONSTRAINT `sol_teacher_subjects_Subject_ID_foreign` FOREIGN KEY (`Subject_ID`) REFERENCES `sol_subjects`(`ID`),
  CONSTRAINT `sol_teacher_subjects_Grade_Level_ID_foreign` FOREIGN KEY (`Grade_Level_ID`) REFERENCES `sol_grades`(`ID`),
  CONSTRAINT `sol_teacher_subjects_Semester_ID_foreign` FOREIGN KEY (`Semester_ID`) REFERENCES `sol_semester`(`ID`)

) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_student_subjects` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Student_ID` INT NOT NULL,
  `Subject_ID` INT NOT NULL,
  `Semester_ID` INT NOT NULL,
  `Class_ID` INT NOT NULL,
  `Grade_Of_Student` DECIMAL(5,2),
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `sol_student_subjects_Student_ID_foreign` FOREIGN KEY (`Student_ID`) REFERENCES `sol_student`(`ID`),
  CONSTRAINT `sol_student_subjects_Subject_ID_foreign` FOREIGN KEY (`Subject_ID`) REFERENCES `sol_subjects`(`ID`),
  CONSTRAINT `sol_student_subjects_Semester_ID_foreign` FOREIGN KEY (`Semester_ID`) REFERENCES `sol_semester`(`ID`),
  CONSTRAINT `sol_student_subjects_Class_ID_foreign` FOREIGN KEY (`Class_ID`) REFERENCES `sol_class`(`ID`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `sol_lessons` (
  `ID` INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
  `Teacher_Subject_ID` INT NOT NULL,
  `Grade_Level_ID` INT NOT NULL,
  `Semester_ID` INT NOT NULL,
  `Class_ID` INT NOT NULL,
  `Day` ENUM('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday') NOT NULL,
  `From` TIME NOT NULL,
  `To` TIME NOT NULL,
  
  CONSTRAINT chk_lesson_time CHECK (`From` < `To`),
  
  `created_at` TIMESTAMP DEFAULT(CURRENT_TIMESTAMP),
  `updated_at` DATETIME,
  `deleted_at` DATETIME,
  
  CONSTRAINT `sol_lessons_Teacher_Subject_ID_foreign` FOREIGN KEY (`Teacher_Subject_ID`) REFERENCES `sol_teacher_subjects`(`ID`),
  CONSTRAINT `sol_lessons_Grade_Level_ID_foreign` FOREIGN KEY (`Grade_Level_ID`) REFERENCES `sol_grades`(`ID`),
  CONSTRAINT `sol_lessons_Semester_ID_foreign` FOREIGN KEY (`Semester_ID`) REFERENCES `sol_semester`(`ID`),
  CONSTRAINT `sol_lessons_Class_ID_foreign` FOREIGN KEY (`Class_ID`) REFERENCES `sol_class`(`ID`)

) ENGINE = InnoDB;