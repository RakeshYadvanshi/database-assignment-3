CREATE DATABASE  IF NOT EXISTS `kumar50`;
USE `kumar50`;

--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `students` VALUES (8786950,'Rakesh Kumar','rkumar6950@conestogac.on.ca');
INSERT INTO `students` VALUES (8786951,'Joginder Singh','joginder6951@conestogac.on.ca');
INSERT INTO `students` VALUES (8786952,'Satvinder Singh','satvinder6952@conestogac.on.ca');
INSERT INTO `students` VALUES (8786953,'Yajuvendra Singh','Yajuvender6953@conestogac.on.ca');

--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int NOT NULL,
  `course_title` varchar(45) DEFAULT NULL,
  `course_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `courses` VALUES 
(1,'Database','This is advace database subject'),
(2,'Javascript','This is advance Javascript for students already have some knolwege of js'),
(3,'Android Application','This is going to conver basics');

DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `letter_grade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_grade_fk_idx` (`student_id`),
  KEY `student_course_fk_idx` (`course_id`),
  CONSTRAINT `student_course_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `student_grade_fk` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
);

INSERT INTO `grades` VALUES (1,8786950,1,'A'),(2,8786950,2,'A+');
INSERT INTO `grades` VALUES (3,8786951,1,'B'),(4,8786951,2,'A');
INSERT INTO `grades` VALUES (5,8786952,1,'C'),(6,8786952,2,'B+');
INSERT INTO `grades` VALUES (7,8786953,1,'A'),(8,8786953,2,'C+');