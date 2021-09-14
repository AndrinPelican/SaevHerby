<!--

http://localhost/SaevHerby/enterResultsApi.php

This file has as goal to be a simple php Rest API, where you can send a
JSON post request, with information of the format "student result"

{
   "studentId":"54",
   "testId":"2345",
   "results": {"423": 1,
               "425": 0,
               "424": 4}
}


That meand that student with id "54"
has witten the test "2345",
the results of question "423" is A (encoded as 1)
the results of question "425" is No cross (encoded as 0)
the results of question "423" is D (encoded as 4)

There are 40. fields


This file will recie the post request and parse the json
Then opens the DB Connection
Write the names into the db
Returns "Successfull"


use postman postman.com to sent a
post request
application/json

 -->




<?php

  $insertResultRequest = json_decode(file_get_contents('php://input'), true);
  // print_r helps to see how jsons is parsed into php objects
  // print_r($data);

  echo $insertResultRequest["studentId"];


  // the DB connection
  $servername = "localhost:3306";
  $username = "root";
  $password = "luzhsdiu9q'w hlkasdjfpo";
  $dbname = "myDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // student_id INT(6) PRIMARY KEY,
  // test_name VARCHAR(30) NOT NULL,
  // first_field  INT(6),
  // second_fiel


  // prepareing the DB query
  $sql = "INSERT INTO Results (firstname, lastname, email)
           VALUES ('John', 'Doe', 'john@example.com');";

  foreach ($insertGuestsRequest["guests"] as $guest) {
    $sql .=  "INSERT INTO MyGuests (firstname, lastname, email)
             VALUES ( '{$guest["firstname"]}','{$guest["lastname"]}','{$guest["email"]}');";
  }





  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();


?>
