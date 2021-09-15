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


$sql = "DROP TABLE  IF EXISTS Students";
if ($conn->query($sql) === TRUE) {
  echo "Droped Table";
} else {
  echo "Message: " . $conn->error;
}
echo "<br>";

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
//
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Message: " . $conn->error;
}
echo "<br>";

// ==============================================================
// First delete all then insert Students
// goal is that there are alwais the 3 student "Carlo", "Juan", "Ana" in the DB


$sql = "DELETE FROM Students";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
echo "<br>";

// $sql = "sdf"

$sql = "INSERT INTO Students (student_name, class_id, class_name,school_id,school_name,year, city_id, city_name)
        VALUES ('Carlo', 111,'2a',222 ,'Escola Heilo', 2 ,4, 'Olinda' );";



$sql .= "INSERT INTO Students (student_name, class_id, class_name,school_id,school_name,year, city_id, city_name)
                VALUES ('Juan', 111,'2a',222 ,'Escola Heilo', 2 ,4, 'Olinda' );";



$sql .= "INSERT INTO Students (student_name, class_id, class_name,school_id,school_name,year, city_id, city_name)
                VALUES ('Ana', 333,'2B',555 ,'Escola caic', 2 ,4, 'Baiha' );";


if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Message: " . $sql . "<br>" . $conn->error;
}
$conn->close();

echo "<br>";



// ===================================================================
//
//                      Creating the result Table
//
// ===================================================================



$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Message: " . $conn->connect_error);
}



$sql = "DROP TABLE  IF EXISTS Results";
if ($conn->query($sql) === TRUE) {
  echo "Droped Table";
} else {
  echo "Message: " . $conn->error;
}
echo "<br>";


// school_id,school_name,class_id,class_name,year,student_id,student_name,birth_date,gender
// sql to create table
$sql = "CREATE TABLE Results (
    student_id INT(6),
    test_id VARCHAR(30) NOT NULL,
    id_423  INT(6),
    id_424  INT(6),
    id_425  INT(6)
)";


if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Message: " . $conn->error;
}
echo "<br>";

$conn->close();

?>
