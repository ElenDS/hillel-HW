<?php

$dbh = new PDO('mysql:host=demo-mysql;dbname=demo', 'root', 'root');

$dbh->query(
    'CREATE TABLE posts (id int AUTO_INCREMENT PRIMARY KEY, title varchar(250) NULL, content varchar(1000) NULL, category_id int NULL, created_at timestamp NULL, updated_at timestamp NULL)'
);

$dbh->query(
    'CREATE TABLE categories (id int AUTO_INCREMENT PRIMARY KEY, title varchar(250) NULL, created_at timestamp NULL, updated_at timestamp NULL)'
);

$dbh->query(
    'CREATE TABLE tags (id int AUTO_INCREMENT PRIMARY KEY, name varchar(250) NULL, created_at timestamp NULL, updated_at timestamp NULL)'
);

$dbh->query(
    'CREATE TABLE post_tag (id int AUTO_INCREMENT PRIMARY KEY, post_id int NOT NULL, tag_id int NOT NULL, created_at timestamp NULL, updated_at timestamp NULL)'
);