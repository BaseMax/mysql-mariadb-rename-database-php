<?php
/*
 * @Name: Mysql Mariadb Rename Database PHP
 * @Author: Max Base
 * @Date: 2020-12-26
 * @Repository: https://github.com/basemax/mysql-mariadb-rename-database-php
 */

// Limit
ini_set('max_execution_time', 0);
set_time_limit(0);

// Config
$servername = "localhost";
$username = "root";
$password = "01";
$dbname = "stock";
$nextDbname= "newDB";

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

$sql = "SHOW tables;";
$result = mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    if(isset($row["Tables_in_".$dbname])) {
      $tables[] = $row["Tables_in_".$dbname];
    }
  }
}

// Print tables
print_r($tables);

// Move tables
$mysqli->query("SET FOREIGN_KEY_CHECKS = 0;");
foreach($tables as $table) {
  $newTable = $nextDbname. ".".$table;
  $table = $dbname.".".$table;
  // $mysqli->query("RENAME TABLE $table TO $newTable;");
  $mysqli->query("ALTER TABLE $table RENAME $newTable;");
}
$mysqli->query("SET FOREIGN_KEY_CHECKS = 1;");

// Close transactions
$mysqli->commit();

// Drop old tables: not required
// foreach($tables as $table) {
//   $mysqli->query("DROP TABLE ".$table);
// }

// Close
mysqli_close($mysqli);
// mysqli_close($mysqliNext);
