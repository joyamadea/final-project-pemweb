CREATE DATABASE customer;

USE customer;

CREATE TABLE users (
  username varchar(50) PRIMARY KEY,
  email varchar(50) UNIQUE NOT NULL,
  password varchar(50) NOT NULL,
  first_name varchar(50) NOT NULL,
  last_name varchar (50),
  dob DATE NOT NULL,
  gender varchar(7),
  profile_pic varchar(200),
  bio varchar(60)
) ENGINE=InnoDB;

CREATE TABLE post(
  post_id varchar (20) NOT NULL,
  username varchar(50) NOT NULL,
  teks varchar(600),
  gambar varchar(200) NOT NULL,

  PRIMARY KEY (post_id,username),
  FOREIGN KEY (username) REFERENCES users(username)
)engine=InnoDB;

CREATE TABLE comment(
  comm_id varchar(10) NOT NULL,
  username varchar(10) NOT NULL,
  post_id varchar(10) NOT NULL,
  comment varchar(600) NOT NULL,

  PRIMARY KEY (comm_id,username,post_id),
  FOREIGN KEY (username) REFERENCES users(username),
  FOREIGN KEY (post_id) REFERENCES post(post_id)
 )engine=InnoDB;

 INSERT INTO users
 VALUES('joyamadea','joya8858@gmail.com','cb7b04acc483b9fb99973d374edd3e90','Joy',NULL,'1999-12-15','F','images/profile/uwu.jpg',NULL);

 INSERT INTO post
 VALUES('post5e676c','joyamadea','hello my name is uyu','images/posts/uyu.png')

  

 
  