<!--

This file is here to setup the Database

creates table

enters studenst

 -->


<?php

$servername = "localhost:3306";
$username = "root";
$password = "luzhsdiu9q'w hlkasdjfpo";
$dbname = "myDB";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// ==============================================================
// Create database

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Message: " . $conn->error;
}
echo "<br>";
$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Message: " . $conn->connect_error);
}
//


$sql = "DROP TABLE  IF EXISTS Employees";
$conn->query($sql)


// school_id,school_name,class_id,class_name,year,student_id,student_name,birth_date,gender
// sql to create table
$sql = "CREATE TABLE Students (
        student_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        student_name VARCHAR(30) NOT NULL,
        class_id  INT(6),
        class_name VARCHAR(30) NOT NULL,
        school_id  INT(6),
        school_name VARCHAR(30) NOT NULL,
        year INT(6),
        city_id  INT(6),
        city_name VARCHAR(30) NOT NULL
)";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Message: " . $conn->error;
// }
// echo "<br>";
//
// // ==============================================================
// // First delete all then insert Students
// // goal is that there are alwais the 3 student "Carlo", "Juan", "Ana" in the DB
//
//
// $sql = "DELETE FROM Students";
// if ($conn->query($sql) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }
// echo "<br>";
//
//
//
// $sql = "INSERT INTO Students (student_name, class_id, class_name,school_id,school_name,year, city_name, city_id)
// VALUES ('Carlo', 111,'2a',222 ,'Escola Heilo', 2 , "olinda",4 );";
// $sql .= "INSERT INTO Students (student_name, class_id, class_name,school_id,school_name,year, city_name, city_id)
// VALUES ('Juan', 111,'2a',222 ,'Escola Heilo', 2 , "olinda",4);";
// $sql .= "INSERT INTO Students (student_name, class_id, class_name,school_id,school_name,year, city_name, city_id)
// VALUES ('Ana', 444,'2b',333 ,'Escola Prof. Maria', 2, "Victoria De Conquista",4 );";
//
// if ($conn->multi_query($sql) === TRUE) {
//   echo "New records created successfully";
// } else {
//   echo "Message: " . $sql . "<br>" . $conn->error;
// }
// $conn->close();







// ===================================================================
//
//                      Creating the result Table
//
// ===================================================================


//
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Message: " . $conn->connect_error);
// }
//
// // school_id,school_name,class_id,class_name,year,student_id,student_name,birth_date,gender
// // sql to create table
// $sql = "CREATE TABLE Results (
// student_id INT(6) PRIMARY KEY,
// test_name VARCHAR(30) NOT NULL,
// first_field  INT(6),
// second_field VARCHAR(30) NOT NULL,
// )";
//
//
// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Message: " . $conn->error;
// }
// echo "<br>";

// $conn->close();

?>
