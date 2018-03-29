CREATE TABLE `sports` (
  `sport_num`     INT AUTO_INCREMENT,
  `sport_name`    VARCHAR(30),
  CONSTRAINT `sport_pk` PRIMARY KEY (`sport_num`)
);

CREATE TABLE `member` (
  `member_id`     INT AUTO_INCREMENT,
  `fname`         VARCHAR (30),
  `lname`         VARCHAR (30),
  `signupdate`    DATE,
  `sport`         INT,
  `email`         VARCHAR(30),
   CONSTRAINT `member_sport_fk` FOREIGN KEY(`sport`) REFERENCES `sports`(`sport_num`),
   CONSTRAINT `member_pk` PRIMARY KEY (`member_id`)
);

CREATE TABLE `image` (
  `image_id`      INT AUTO_INCREMENT,
  `image_path`    TEXT,
  CONSTRAINT `image_pk` PRIMARY KEY (image_id)
);