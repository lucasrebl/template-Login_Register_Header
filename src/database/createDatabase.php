<?php
require_once 'database/connect.php';
require 'vendor/autoload.php';

$dsn = new PDO("mysql:host=mysql;dbname=my_database", "my_user", "my_password");
$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$createTableUser = ("CREATE TABLE IF NOT EXISTS
`User` (
    `IdUser` int(11) NOT NULL AUTO_INCREMENT,
    `FirstName` varchar(255) DEFAULT NULL,
    `LastName` varchar(255) DEFAULT NULL,
    `Email` varchar(255) DEFAULT NULL,
    `UserPassword` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`IdUser`),
    CONSTRAINT unique_User_Email UNIQUE (`Email`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1");
$dsn->exec($createTableUser);
