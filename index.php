<!--

You can acess this page in http://localhost/SaevHerby/


This as an example on how you can maka a php interface to Herby. Two tasks:

  - imprimir o cartao de resposta
  - reveber os resultados.


 -->


<html>
<body>

<div class="menu">
  <a href="/SaevHerby/">Criar Cartoes de resposta</a>
  <span style="margin-left: 20px;">    </span> <a href="/SaevHerby/osReslutados.php">Opter os resultados</a>
</div>

<h1> PhP conecao com Herby</h1>

<h2>Criar cartao de resposta:</h2>


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
$sql = "SELECT student_id, student_name, class_id, class_name, school_name, school_id, year FROM Students";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<button onclick="getCrataoDeResposta(\''. $row["student_id"].'\', \''. $row["student_name"] .'\', \''
    . $row["class_id"] .'\', \''. $row["class_name"] .'\', \''. $row["school_id"] .'\', \''. $row["school_name"] .'\', \''
    .$row["year"] .'\')">Abaixar cartao de resposta</button>'. " - Nome: " . $row["student_name"]. " ". " - Classe: " . $row["class_name"]. " ". " - Escola: " . $row["school_name"]. " " . "<br><br>";
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
