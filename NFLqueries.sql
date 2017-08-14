


/*
SQL queries for the NFL project to generate all the relevant tables

Players – includes Player_ID, First_Name, Last_Name, Age, Team_Val and Status.  Player_ID is the primary key. 
Team_Val is a foreign key that corresponds with the Team_ID attribute of the Team entity. 

Team – includes Team_ID, Name, Super_Bowl_Wins, City_Val, and Division.  Team_ID is the primary key. 
City_Val is a foreign key that corresponds with the City_ID attribute of the City entity.

City – Includes City_ID, Team_Val2, and Location. City_ID is the primary key. 
Team_Val2 is a foreign key that corresponds with the Team_ID attribute of the Team entity.

Position – Includes Position_ID and Name. Position_ID is the primary key.

Coach – Includes Coach_ID, Name, Age, Team_Val3, and Team. Coach_ID is the primary key. 
Team_Val3 is a foreign key that corresponds with the Team_ID attribute of the Team entity.

Player_Position – Includes Player_Val and Position_Val as a primary key. 
Player_Val is a foreign key that corresponds with the Player_ID attribute of the Player entity. 
Position_Val is a foreign key that corresponds with the Position_ID attribute of the Position entity.


*/


CREATE TABLE METRO
(metro_id int AUTO_INCREMENT primary key,
location varchar(255),
team_val2 int) ENGINE=InnoDB


CREATE TABLE TEAM
(team_id int AUTO_INCREMENT primary key,
name varchar(255),
sbwins int,
metro_val int NOT NULL,
divison varchar(255)) ENGINE=InnoDB

ALTER TABLE TEAM
ADD FOREIGN KEY (`metro_val`)
REFERENCES METRO(metro_id)

ALTER TABLE METRO
ADD FOREIGN KEY (`team_val2`)
REFERENCES TEAM(team_id)


CREATE TABLE PLAYER
(player_id int AUTO_INCREMENT primary key,
fname varchar(255),
lname varchar(255),
age int,
team_val int,
status varchar(255),
CONSTRAINT `constraintThree` FOREIGN KEY (`team_val`) REFERENCES `TEAM` (`team_id`)) ENGINE=InnoDB

CREATE TABLE FBPOSITION
(position_id int AUTO_INCREMENT primary key,
offenseDefense varchar(255),
name varchar(255)) ENGINE=InnoDB

CREATE TABLE PLAYER_POSITION
(player_val int,
position_val int,
primary key (player_val, position_val),
CONSTRAINT `constraintFour` FOREIGN KEY (`player_val`) REFERENCES `PLAYER` (`player_id`),
CONSTRAINT `constraintFive` FOREIGN KEY (`position_val`) REFERENCES `FBPOSITION` (`position_id`)) ENGINE=InnoDB


CREATE TABLE COACH
(coach_id int AUTO_INCREMENT primary key,
name varchar(255),
age int,
team_val3 int,
CONSTRAINT `constraintSix` FOREIGN KEY (`team_val3`) REFERENCES `TEAM` (`team_id`)) ENGINE=InnoDB



