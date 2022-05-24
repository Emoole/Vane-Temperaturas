<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "test"
);

//Saber si la bd está conenctada
 if (isset($conn)){ 
          echo "Está conectada";
 }
?>