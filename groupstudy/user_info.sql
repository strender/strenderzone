CREATE TABLE `user_info` (
  `user_key` INT AUTO_INCREMENT,
  `user_id` VARCHAR(20) NOT NULL,
  `user_pw` VARCHAR(40) NOT NULL,
  `join_date` DATETIME NOT NULL,
  `user_name` VARCHAR(20) NOT NULL,
  `gender` VARCHAR(1),
  `birthdate` DATE,
  `email` VARCHAR(40),
  `phone` VARCHAR(16),
  `avail_city` VARCHAR(32),
  PRIMARY KEY (`user_key`)
);

INSERT INTO `user_info` VALUES (1, 'user1', '745c52f30f82d4323292dcca9eea0aee87feecc5', '2013-01-03 14:51:46', '김범수', 'M', '1984-07-19', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (2, 'user2', '12a20bcb5ed139a5f3fc808704897762cbab74ec', '2013-01-03 14:52:09', '윤도현', 'M', '1973-05-13', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (3, 'user3', '676a6666682bd41bef5fd1c1f629fa233b1307a4', '2013-01-03 14:53:05', '박정현', 'F', '1974-09-13', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (4, 'user4', '1ff915f2fae864032e44cbe5a6cdd858500c9df7', '2013-01-03 14:58:40', '타블로', 'M', '1977-02-23', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (5, 'user5', '53a56acb2a52f3815a2518e75029b071c298477a', '2013-01-03 15:00:37', '박진영', 'M', '1943-03-27', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (6, 'user6', 'df00f36c0b795c30a0409778d7f9db27a970f74f', '2013-01-03 15:00:48', '양현석', 'M', '1968-06-04', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (7, 'user7', '7c19dd287e03ae31ce190c4043b5a7f9795c41dc', '2013-01-03 15:01:08', '유희열', 'M', '1975-07-08', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (8, 'user8', '3da70cd115b7c3a7cebc2b5282706f07d185de9e', '2013-01-03 15:01:19', '이 적', 'M', '1969-09-24', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (9, 'user9', '08447be571e1c113f2f175472753ca5f5af454f3', '2013-01-03 15:01:51', '베토벤', 'M', '1970-04-26', 'aa@gmail.com', '010-0000-0000', '');
INSERT INTO `user_info` VALUES (10, 'user10', '230dcb28e2d1dc19ec14990721e85cd5c5234245', '2013-01-03 15:02:02', '서태지', 'M', '1964-12-18', 'aa@gmail.com', '010-0000-0000', '');