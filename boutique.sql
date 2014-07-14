DROP DATABASE IF EXISTS boutique;

CREATE DATABASE IF NOT EXISTS boutique;

USE boutique;

CREATE TABLE users 
(
	id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(32) NOT NULL,
	password VARCHAR(32) NOT NULL,
	firstname VARCHAR(32) NOT NULL,
	lastname VARCHAR(32) NOT NULL,
	adress text NOT NULL,
	city VARCHAR(32) NOT NULL,
	zip VARCHAR(7) NOT NULL,
	email VARCHAR(64) NOT NULL,
	phone VARCHAR(14) NOT NULL,
	cellphone VARCHAR(14),
	country VARCHAR(32) NOT NULL,
	province VARCHAR(32) NOT NULL,
	UNIQUE (name),
	CONSTRAINT pk_users PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE products
(
	id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(32) NOT NULL,
	sku VARCHAR(32) NOT NULL,
	price DOUBLE NOT NULL,
	details VARCHAR(128),
	poid DOUBLE NOT NULL,
	UNIQUE (sku),
	UNIQUE (name),
	CONSTRAINT pk_products PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE bills
(
	id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
	user_id BIGINT UNSIGNED NOT NULL,
	total INT NOT NULL,
	CONSTRAINT pk_bills PRIMARY KEY (id),
	CONSTRAINT user_id FOREIGN KEY ( user_id ) REFERENCES users( id )
)ENGINE=InnoDB;

CREATE TABLE bills_products
(
	id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
	bill_id BIGINT UNSIGNED NOT NULL,
	product_id BIGINT UNSIGNED NOT NULL,
	quantity INT NOT NULL,
	CONSTRAINT pk_bills_products PRIMARY KEY (id),
	CONSTRAINT bill_id FOREIGN KEY (bill_id) REFERENCES bills(id),
	CONSTRAINT product_id FOREIGN KEY (product_id) REFERENCES products(id)
)ENGINE=InnoDB;