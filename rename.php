<?php
/*
 * @Name: Mysql Mariadb Rename Database PHP
 * @Author: Max Base
 * @Date: 2020-12-26
 * @Repository: https://github.com/basemax/mysql-mariadb-rename-database-php
 */

// Config
$servername = "localhost";
$username = "root";
$password = "01";
$dbname = "stock";
$nextDbname= "newDB";
$dbname = "newDB";
$nextDbname= "stock";

// Global variables
$tables = [];

// Open
$mysqli = new mysqli($servername, $username, $password, $dbname);
if($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
