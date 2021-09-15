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


use postman postman.com to send a
post request
application/json

 -->




<?php
  $insertResultRequest = json_decode(file_get_contents('php://input'), true);
  // print_r helps to see how jsons is parsed into php objects
  // print_r($data);

  if ($insertResultRequest["token"]!="secret"){
    echo "not authenticated";
    var_dump(http_response_code(401));
  }else {
    echo $insertResultRequest["student_id"];
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

    // echo $insertResultRequest

    // // prepareing the DB query
    // $sql = "INSERT INTO Results (student_id, test_id, id_423, id_424, id_425)
    //          VALUES ($insertResultRequest['student_id'],$insertResultRequest['testId'], $insertResultRequest['student_id'],$insertResultRequest['student_id'],$insertResultRequest['student_id']);";

    $sql = "INSERT INTO Results (student_id, test_id, id_423, id_424,id_425)
            VALUES (". $insertResultRequest['student_id'].",".$insertResultRequest['testId'].",".$insertResultRequest['results']['423'].",".$insertResultRequest['results']['424'].",".$insertResultRequest['results']['425'].");";
            echo $sql;

    if ($conn->multi_query($sql) === TRUE) {
      echo "New records created successfully";
      // The information was entered, therefore we return a 200 ok
      var_dump(http_response_code(200));
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      // there was an error
      var_dump(http_response_code(400));
    }
    //
    $conn->close();
  }

?>
