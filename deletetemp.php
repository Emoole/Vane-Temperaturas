<?php

include("db.php");

if(isset($_GET['Temperature'])) {
  $Temperature = $_GET['Temperature'];
  $query = "DELETE FROM temp WHERE Temperature = $Temperature";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Temperature Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>