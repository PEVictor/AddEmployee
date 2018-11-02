/*
DROP TABLE IF EXISTS addemployee_documents;
DROP TABLE IF EXISTS addemployee_employees;
DROP TABLE IF EXISTS addemployee_user;
*/

CREATE TABLE addemployee_user (
	id INT NOT NULL AUTO_INCREMENT,
	email VARCHAR(255) NOT NULL,
	pass VARCHAR(255) NOT NULL,
	admin INT NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE addemployee_employees (
	id INT NOT NULL AUTO_INCREMENT,
	id_user INT NOT NULL,
	creation_date DATE NOT NULL,
	visible INT NOT NULL,
	permissions VARCHAR(3) NOT NULL,
	name VARCHAR(255),
	FOREIGN KEY (id_user) REFERENCES addemployee_user(id),
	PRIMARY KEY (id)
);

CREATE TABLE addemployee_documents (
	id INT NOT NULL AUTO_INCREMENT,
	id_user INT NOT NULL,
	file VARCHAR(255) NOT NULL,
	creation_date DATE NOT NULL,
	FOREIGN KEY (id_user) REFERENCES addemployee_user(id),
	PRIMARY KEY (id)
);

/*
user: admin@admin.com
pass: PhzHRPdbxoSR

user: user@admin.com
pass: S7TEeIj5na71 
*/