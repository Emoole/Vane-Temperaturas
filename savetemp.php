<?php

include("db.php");

if (isset($_POST['savetemp'])) {
    $Temperature= $_POST['Temperature'];
    $LastC= $_POST['LastC'];
    $Place= $_POST['Place'];
    $Descripcion = $_POST['Descripcion'];
    $Fechatemp = $_POST['Fechatemp'];


    $query = "INSERT INTO temp(Temperature,LastC,Place,Descripcion,Fechatemp) 
    VALUES ('$Temperature', '$LastC','$Place', '$Descripcion','$Fechatemp')";
    
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Falla Query");

    }

    echo 'guardado';

    
}

?>