<?php 

define("DB_NAME", "phpdev");

define("USER", "root");

define("DB_PASS", "");

define("HOST", "127.0.0.1");

define("CHARSET", "utf8");

define("ITEMS_NUM", 2);

$dsn = "mysql:host=" .HOST. ";dbname=" .DB_NAME. ";charset=" .CHARSET;

$pdo = new PDO($dsn, USER, DB_PASS);

