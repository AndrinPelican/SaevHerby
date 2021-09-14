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
$sql = "SELECT student_id FROM Results";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " - student_id: " . $row["student_id"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>


</div>



<script>
  console.log("sdf");
  function getCrataoDeResposta(studentId, student_name, class_id, class_name, school_id, school_name, year){

    var request = {
      studentId:studentId,
      student_name:student_name,
      class_id:class_id,
      class_name:class_name,
      school_id:school_id,
      school_name:school_name,
      year:year
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log("this");
        console.log(this);
        var file =  new Blob([this.response], {type: 'application/pdf'});
        var fileURL = URL.createObjectURL(file);
        window.open(fileURL);
      }
    };
    xhttp.open("POST", "http://localhost:8082/getCartaoDeResposta", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.responseType = "arraybuffer";
    console.log("http.responseType");
    console.log(xhttp.responseType);
    xhttp.send(JSON.stringify(request),{responseType: 'arraybuffer'});
  }

 </script>
</body>
</html>
