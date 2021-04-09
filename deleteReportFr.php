<?php
// connects to database
$dbServerName = "sql200.epizy.com";
$dbUsername = "epiz_28227108";
$dbPassword = "oHMwN1a0Xu";
$dbName = "epiz_28227108_cypress";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}

$id = $_POST['delete'];

$reg = "DELETE FROM `reports` WHERE id = $id";

if ($conn->query($reg) === TRUE) {
  header("Location: myReportsFr.php");
} else {
  echo "error";
}

 ?>
