<?php

    $opcionseleccionada=$_GET["opcion"];

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="bdencuesta1";

    $conx=new mysqli($servername,$username,$password,$dbname);

    if ($conx->connect_error) {
        die("Error en la conexion".$conx->connect_error);
    }

    $sql = "UPDATE tableencuesta SET cantidad=0";

    if ($conx->query($sql) === true) {
        echo '<script language="javascript">alert("Se Coloco en 0 el Nro de Encuestados");</script>';
        require 'pagadmin.html';
    }else {
        echo "Error updating record: " . $conx->error;
    }

    $conx->close();

?>