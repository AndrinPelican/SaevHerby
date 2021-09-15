<!--

Showing the reuslts of the students.

The results where enterd into the system per rest API call.

 -->

<html>
<body>
  <div class="menu">
    <a href="/SaevHerby/">Criar Cartoes de resposta</a>
    <span style="margin-left: 20px;">    </span> <a href="/SaevHerby/osReslutados.php">Opter os resultados</a>
  </div>
<h1>Os resultados dos alunos:</h1>

<?php
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

echo "<br><br>";
$sql = "SELECT student_id, id_423, id_424,id_425 FROM Results";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  // output data of each row
  while($row = $result->fetch_assoc()) {

    // second Db_request
    $sqlStudentName = "SELECT student_id, student_name FROM Students WHERE student_id=".$row['student_id'].";";
    $resultStudentName = $conn->query($sqlStudentName);
    if ($resultStudentName->num_rows > 0) {
      $name = "lol";
      while($rowStudent = $resultStudentName->fetch_assoc()) {
        $name = $rowStudent['student_name'];
      }
      echo $name;
      echo "<br>";
      echo " result 423: " . $row["id_423"]." -  result 424: " . $row["id_424"]." -  result 425: " . $row["id_425"];
      echo "<br>";
      echo "<br>";

    }
  }

} else {
  echo "0 results";
}
$conn->close();
?>


</div>

</body>
</html>
