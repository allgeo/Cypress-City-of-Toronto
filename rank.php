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

$command = "SELECT * FROM `reports`";
 $result = $conn->query($command);

 while ($report = mysqli_fetch_row($result)) {
   $address = $report[3];
   $rank = $report[7];
   $id = $report[0];
   $cmd = "SELECT * FROM `reports` WHERE `address` LIKE '%$address%'";
   $amount = $conn->query($cmd);
   $rank = $rank + mysqli_num_rows($amount);

   $reg = "UPDATE `reports` SET `totalR`='$rank' WHERE `id`='$id'";
   if ($conn->query($reg) === TRUE) {
     header("Location: reportRanking.php");
   } else {
     header("Location: reportsHome.html");
   }

}
?>
