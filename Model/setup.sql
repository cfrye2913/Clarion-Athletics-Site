CREATE TABLE `member` (
  `member_id`     INT AUTO_INCREMENT,
  `fname`         VARCHAR (30),
  `lname`         VARCHAR (30),
  `signupdate`    DATE,
  `sport`         TINYINT(32),
  `email`         VARCHAR(30),
  CONSTRAINT `member_pk` PRIMARY KEY (`member_id`)
);

CREATE TABLE `sport` (
  `sport_num`     INT AUTO_INCREMENT,
  `sport_name`    VARCHAR(30),
  CONSTRAINT `sport_pk` PRIMARY KEY (`sport_num`)
);