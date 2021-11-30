<?php
header('Content-Type: application/json');

require_once('db.php');

$sqlQuery = "SELECT showOrderId, movieName, price FROM showorder ORDER BY showOrderId";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>