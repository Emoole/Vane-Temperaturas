<?php
 
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
		dataPoints: <?php echo json_encode($tempdata, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

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