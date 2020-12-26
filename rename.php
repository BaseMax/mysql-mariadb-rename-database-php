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

// Open NextDB: not required
// $mysqliNext = new mysqli($servername, $username, $password, $nextDbname);
// if($mysqliNext->connect_error) {
//   die("Connection failed: " . $mysqliNext->connect_error);
// }

// Open transactions
// https://dev.mysql.com/doc/refman/8.0/en/commit.html
// https://mariadb.com/kb/en/start-transaction/
// https://mariadb.com/kb/en/transactions/
// https://mariadb.com/kb/en/mariadb-transactions-and-isolation-levels-for-sql-server-users/
$mysqli->autocommit(FALSE);

// Close transactions
$mysqli->commit();

// Drop old tables: not required
// foreach($tables as $table) {
//   $mysqli->query("DROP TABLE ".$table);
// }

// Close
mysqli_close($mysqli);
// mysqli_close($mysqliNext);
