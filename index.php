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



$age = array("Escola Heilo"=>"222", "Escola CAIC"=>"555");

foreach($age as $x => $x_value) {


  echo "<br><br>";
  $sql = "SELECT student_id, student_name, class_id, class_name, school_name, school_id, year, city_id, city_name FROM Students WHERE school_id=$x_value;";
  $result = $conn->query($sql);



  echo '<button onclick="getCrataoDeResposta'.$x_value.'()">Abaixar cartao de resposta</button>'.' ' . $x  ;

  echo '<script>
          console.log("sdf");
          function getCrataoDeResposta'.$x_value.'(){
            var request = {
              studentInformationList: [';
              $ind = 0;
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   echo '
                                 {studentId:"'.$row["student_id"].'",
                                 student_name:"'. $row["student_name"] .'",
                                 class_id:"'. $row["class_id"] .'",
                                 class_name:"'. $row["class_name"] .'",
                                 school_id:"'. $row["school_id"] .'",
                                 school_name:"'. $row["school_name"] .'",
                                 year:"'. $row["year"] .'",
                                 city_id:"'. $row["city_id"] .'",
                                 city_name:"'. $row["city_name"] .'"
                               }';
                  if ($ind!=$result->num_rows-1 ){
                    echo ",";
                  }

                  $ind += 1;
                }
              }
              else {
                echo "0 results";
              }
  echo ']}
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          console.log("this");
          console.log(this);
          var file =  new Blob([this.response], {type: "application/pdf"});
          var fileURL = URL.createObjectURL(file);
          window.open(fileURL);
          }
          };
          xhttp.open("POST", "http://localhost:8082/getCartaoDeResposta", true);
          xhttp.setRequestHeader("Content-type", "application/json");
          xhttp.responseType = "arraybuffer";
          console.log("http.responseType");
          console.log(xhttp.responseType);
          xhttp.send(JSON.stringify(request),{responseType: "arraybuffer"});
          }
  </script>
  ';
}



$conn->close();
?>


</div>

</body>
</html>
