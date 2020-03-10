CREATE DATABASE customer;

USE customer;

CREATE TABLE users (
  username varchar(50) PRIMARY KEY,
  email varchar(50) UNIQUE NOT NULL,
  first_name varchar(50) NOT NULL,
  last_name varchar (50),
  dob DATE,
  gender enum('Male', 'Female') NOT NULL,
  profpic varchar(100),
  bio text,
  password varchar(250) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE post(
  post_id varchar (10),
  username varchar(50),
  teks varchar(600),
  gambar varchar(200),

  PRIMARY KEY (post_id,username),
  FOREIGN KEY (username) REFERENCES users(username)
)engine=InnoDB;

CREATE TABLE comment(
  comm_id varchar(10),
  username varchar(10),
  post_id varchar(10),
  comment varchar(600),

  PRIMARY KEY (comm_id,username,post_id),
  FOREIGN KEY (username) REFERENCES users(username),
  FOREIGN KEY (post_id) REFERENCES post(post_id)
 )engine=InnoDB;

  

 
  