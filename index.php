<?php include("db.php")?>

<?php include("includes/header.php")?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">
            <div class="card card body">
                <!--Aquí manda la tarea de guardar -->
                <form action="savetemp.php" method="POST">
                    <div class="form-gruop">
                        <input type="text" name="Temperature" class="form-control" placeholder="Temperature" autofocus>
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="LastC" class="form-control" placeholder="LastC">
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="Place" class="form-control" placeholder="Place">
                    </div>
                    <div class="form-gruop">
                        <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion">
                    </div>
                    <div class="form-gruop">
                        <input type="datetime-local" name="Fechatemp" class="form-control" placeholder="Fechatemp">
                    </div>
                    <!-- <div class="form-group">
                        <textarea name="Nombre" id="" rows="2" class="form-control" placeholder="Descripción tarea"></textarea>
                    </div -->
                    <input type="submit" class="btn btn-success btn-block" name="savetemp" value="Record Temperature">
                </form>
            </div>

        </div>

        
        </div>

        
        <div class="col-md-8">


        </div>
        <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>TemperatureId</th>
            <th>Temperatura</th>
            <th>LastC</th>
            <th>Place</th>
            <th>Descripcion</th>
            <th>Fechatemp/th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM temp";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['TemperatureId']; ?></td>
            <td><?php echo $row['Temperatura']; ?></td>
            <td><?php echo $row['LastC']; ?></td>
            <td><?php echo $row['Place']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
            <td><?php echo $row['Fechatemp']; ?></td>
            <td>
              <!-- <a href="edit.php?Temperature=<?php echo $row['Temperature']?>" class="btn btn-secondary">
                <i class="fas fa-marker">Editar</i>
              </a> -->
              <a href="deletetemp.php?Temperature=<?php echo $row['Temperature']?>" class="btn btn-danger">
                <i class="far fa-trash-alt">Eliminar</i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
    </div>
</div>
<div> Graficas</div>
<?php
 
 #Gráficas en la web
 $query2 = "SELECT COUNT * FROM temp";
 $result_tasks2 = mysqli_query($conn, $query); 
 //Convertir $result_tasks2 en un entero
 $y2=$result_tasks2;
 $dataPoints2 = array();
 for($i = 0; $i < $y2; $i++){
  $query3 = "SELECT Temperature FROM temp WHERE TemperatureId=$i";
  $temp2=mysqli_query($conn, $query);
	array_push($dataPoints2, array("x" => $temp2, "y" => $i));
} 

$tempdata = array(
	array("y" => 30, "label" => "1"),
	array("y" => 15, "label" => "2"),
	array("y" => 25, "label" => "3"),
	array("y" => 5, "label" => "4"),
	array("y" => 10, "label" => "5"),
	array("y" => 0, "label" => "6"),
	array("y" => 20, "label" => "7"),
    array("y" => 20, "label" => "8")
);

$Humdata = array(
	array("y" => 33, "label" => "1"),
	array("y" => 21, "label" => "2"),
	array("y" => 42, "label" => "3"),
	array("y" => 35, "label" => "4"),
	array("y" => 21, "label" => "5"),
	array("y" => 40, "label" => "6"),
	array("y" => 22, "label" => "7"),
  array("y" => 32, "label" => "8")
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

  var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Temperatura"
	},
	axisY: {
		title: "Temperatura"
	},
    axisX: {
		title: "Tiempo"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


 
/* var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Temperatura"
	},
	axisY: {
		title: "Temperatura"
	},
    axisX: {
		title: "Tiempo"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($tempdata, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render(); */



var chart2 = new CanvasJS.Chart("chartContainer2", {
	title: {
		text: "Humedad"
	},
	axisY: {
		title: "Humedad"
	},
    axisX: {
		title: "Tiempo"
	},
	data: [{
		type: "splineArea",
		dataPoints: <?php echo json_encode($Humdata, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
 
}



</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>            

<?php include("includes/footer.php")?>
    