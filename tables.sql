CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(200) NOT NULL,
	lname VARCHAR(200) NOT NULL,
	email VARCHAR(300) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	gender ENUM('m', 'f') NOT NULL,
	addr VARCHAR(200) NOT NULL,
	city VARCHAR(200) NOT NULL,
	state VARCHAR(50) NOT NULL,
	zip VARCHAR(5) NOT NULL
);
