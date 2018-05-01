CREATE TABLE `sport` (
  `sport_num`     INT AUTO_INCREMENT,
  `sport_name`    VARCHAR(30),
  CONSTRAINT `sport_pk` PRIMARY KEY (`sport_num`)
);

CREATE TABLE `user` (
  `user_id` INT AUTO_INCREMENT,
  `username` VARCHAR(200) UNIQUE NOT NULL,
  `password`  VARBINARY(255),
  `salt`      VARBINARY(255),
  `role`      VARCHAR(50),
  `is_active`  TINYINT(1),
  CONSTRAINT `user_pk` PRIMARY KEY (`user_id`)
);


SET @SALT = SUBSTRING(MD5(RAND()), -10);
INSERT INTO `user` (`username`, `password`, `salt`, `role`) VALUES
  ('admin', SHA2(concat(@SALT, 'password'), 512), @SALT, 'admin');
INSERT INTO `user` (`username`, `password`, `salt`, `role`) VALUES
  ('user', SHA2(concat(@SALT, 'password'), 512), @SALT, 'user');

CREATE TABLE `member` (
  `member_id`     INT AUTO_INCREMENT,
  `fname`         VARCHAR (30),
  `lname`         VARCHAR (30),
  `signupdate`    DATE,
  `sport`         INT,
  `email`         VARCHAR(100),
  `receive_newsletters`   TINYINT(1),
   CONSTRAINT `member_sport_fk` FOREIGN KEY(`sport`) REFERENCES `sport`(`sport_num`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
   CONSTRAINT `member_pk` PRIMARY KEY (`member_id`)
);


CREATE TABLE `image` (
  `image_id`      INT AUTO_INCREMENT,
  `image_path`    TEXT,
  CONSTRAINT `image_pk` PRIMARY KEY (image_id)
);

INSERT INTO `sport` (sport_name) VALUES ("Baseball");
INSERT INTO `sport` (sport_name) VALUES ("Basketball");
INSERT INTO `sport` (sport_name) VALUES ("Cross Country");
INSERT INTO `sport` (sport_name) VALUES ("Football");
INSERT INTO `sport` (sport_name) VALUES ("Golf");
INSERT INTO `sport` (sport_name) VALUES ("Soccer");
INSERT INTO `sport` (sport_name) VALUES ("Softball");
INSERT INTO `sport` (sport_name) VALUES ("Swimming & Diving");
INSERT INTO `sport` (sport_name) VALUES ("Tennis");
INSERT INTO `sport` (sport_name) VALUES ("Volleyball");
INSERT INTO `sport` (sport_name) VALUES ("Wrestling");