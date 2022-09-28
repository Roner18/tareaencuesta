<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title> Resultados Encuestas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font: 15px Montserrat, sans-serif;
      line-height: 1.8;
      color: black;
    }
    
    table{
      padding: 20px;
      width: 40%;
    }
  </style>
</head>
<body>
  <h3>Resultados de la Encuesta de Marcas de Celulares </h3>
  <div>
    <div style="float:left;">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Marcas', 'Votos'],
            <?php
              //variables de coneccion    
              $servername="localhost";
              $username="root";
              $password="";
              $dbname="bdencuesta1";

              //crear coneccion
              $conn=new mysqli($servername,$username,$password,$dbname);

              //check coneccion
              if ($conn->connect_error){
                  die("Coneccion fallada".$conn->connect_error);      }

              //consulta
              $querysql='SELECT opcion,cantidad FROM tableencuesta';
              $result=$conn->query($querysql);

              if($result->num_rows>0){
                  while ($row=$result->fetch_assoc()){
                      echo "['";
                      echo $row["opcion"]."',";
                      echo $row["cantidad"]."],";
                  }
                  echo "]);";
              } else {
                      echo "0 resultados";
              }

              //cerrar coneccion

              $conn->close();

            ?>


          var options = {
            title: 'Estadistica de Encuesta de Marcas de Celulares'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>

      <div id="piechart" style="width: 600px; height: 500px;"></div>         
      
    </div>                
           <?php
                //variables de coneccion    
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="bdencuesta1";

                //crear coneccion
                $conn=new mysqli($servername,$username,$password,$dbname);

                //check coneccion

                if ($conn->connect_error){
                    die("Coneccion fallada".$conn->connect_error);

                }

                //sumar total
                $sql='SELECT sum(cantidad) total FROM tableencuesta';
                $result=$conn->query($sql);
                while ($row=$result->fetch_assoc()){
                  $Total = $row["total"];
                }
              
               // echo "<table border=1>";
                 //   while ($row=$result->fetch_assoc()){
                   //     echo "<tr><td width=55px></td> ";
                     //   echo "<td width=246px></td>";
                    //    echo "<td align=center>".$row["total"]."</td> </tr>";
                    //}
                    //echo "</table>";

                //consulta

                $querysql='SELECT id,opcion,cantidad FROM tableencuesta';
                $result=$conn->query($querysql);

                if($result->num_rows>0){
                    echo "<h1> Tabla de Resultado </h1>";
                    echo "<table border=1>";
                    echo "<tr> <td> id </td> <td> Marca </td> <td> Cantidad  </td> <td> Porcentaje </td> </tr>  ";
                    while ($row=$result->fetch_assoc()){
                      $p = $row["cantidad"] * 100 / $Total;
                      $Porc = round($p,2);
                        echo "<tr> <td>";
                        echo $row["id"]." </td> ";
                        echo "<td>".$row["opcion"]."</td>";
                        echo "<td align=center>".$row["cantidad"]."</td>";
                        echo "<td align=center>".$Porc." %</td> </tr>";
                    }
                    echo "</table>";
                    echo "<left><table border=1px>";
                    echo "<tr><td width=36px></td>";
                    echo "<td width=157px></td>";
                    echo "<td align=center>".$Total."</td>";
                    echo "<td width=184px></td></tr>";
                    echo "</table>";
                } else {
                        echo "0 resultados";
                }
              
                //cerrar coneccion

                $conn->close();
                
                ?>
  </div>
  <br><br>
  <div class="center">
  <a href="index.html"> Volver a la Encuesta </a></p> 
  </div>
  </body>
</html>

