<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 40px;}
  .p1 {font-size: 20px;}
  .p2 {font-size: 30px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>
 <script>
    function enviar(){
        window.alert("Muchas gracias por participar!!!");      
    }     
  </script>


    <div class="container-fluid bg-3 text-center">
        <h3 class="margin">Encuesta Marca de celulares Favoritas </h3>
        <div class="row">
            <div class="col-sm-12">
                <?php
                $opcionseleccionada=$_GET["opcion"];

                $servername="localhost";
                $username="root";
                $password="";
                $dbname="bdencuesta1";

                //linea de conexion
                $conn=new mysqli($servername,$username,$password,$dbname);

                if ($conn->connect_error) {
                    die("Error en la conexion".$conn->connect_error);
                }

                $sql = "UPDATE tableencuesta SET cantidad=cantidad+1 WHERE id=$opcionseleccionada";

                if ($conn->query($sql) === true) {
                    echo "Encuesta Registrada";
                }else {
                    echo "Error updating record: " . $conn->error;
                }

                $conn->close();

                ?>
            </div>
            <div class="row">
                <br> <br>
                <a href="index.html"> Volver a la Encuesta</a>     
            </div>

        </div>    
</body>
</html>