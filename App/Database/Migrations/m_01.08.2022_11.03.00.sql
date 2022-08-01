CREATE TABLE up_user
(
	ID int not null auto_increment,
	EMAIL varchar(500) not null,
	PASSWORD varchar(500) not null,
	ISADMIN bool,
	DATE_CREATE timestamp,
	DATE_UPDATE timestamp,

	PRIMARY KEY (ID)
);
INSERT INTO `up_user`(`EMAIL`, `PASSWORD`, `ISADMIN`, `DATE_CREATE`, `DATE_UPDATE`) VALUES ('admin@test.ru','$2y$10$gFm8caFZPSsyxWiXetJ3eOCZfnTx5qhX0.zXdTIu5rUywdlEJxYQ6','1','2022-08-01 11:03:00','2022-08-01 11:03:00');