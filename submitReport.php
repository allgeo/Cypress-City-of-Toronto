<?php
session_start();
// connects to database
$dbServerName = "sql200.epizy.com";
$dbUsername = "epiz_28227108";
$dbPassword = "oHMwN1a0Xu";
$dbName = "epiz_28227108_cypress";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}

$issueRank = [
  "Utility Failures" => 4,
  "Potholes" => 3,
  "City Property Vandalism" => 2,
  "Erroded Streets" => 3,
  "Tree Collapse" => 4,
  "Flooded Streets" => 5,
  "Mould and Spore Growth" => 1,
  "Garbage/Road Blocking Objects" => 3,
];

if ($_POST['button'] == 'Cancel') {
    header("Location: reportsHome.html");
} elseif ($_POST['button'] == 'Report') {
    $address = ucwords($_POST['address']);
    $problem = $_POST['problem'];
    $description = $_POST['description'];
    $descFix = str_replace("'", "&rsquo;", $description);
    $probs = "";
    $rank = 0;
    for($i=0; $i < count($problem); $i++)
    {
      if ($problem[$i] != "") {
        $probs = $probs . $problem[$i] . ", ";
        $rank = $rank + $issueRank["$problem[$i]"];
      }
    }
    $probs = $probs . $_POST['other'];
    if (!empty($_POST['other'])) { $rank = $rank + 1; }
    echo "$address , $probs , $descFix";

    $uname = "";
    if (isset($_SESSION['user_id'])) {
      $uname = $_SESSION['user_id'];
    } else {
      $uname = 'test';
    }

    $reg = "INSERT INTO `reports` (username, address, issue, description, rank)
    VALUES ('$uname', '$address', '$probs', '$descFix', '$rank')";

    if ($conn->query($reg) === TRUE) {
      header("Location: myReports.php");
    } else {
      echo "error";
    }
} elseif ($_POST['button'] == 'Edit'){
    $id = $_POST['id'];
    $address = ucwords($_POST['address']);
    $problem = $_POST['problem'];
    $description = $_POST['description'];
    $descFix = str_replace("'", "&rsquo;", $description);
    $probs = "";
    $rank = 0;
    for($i=0; $i < count($problem); $i++)
    {
      if ($problem[$i] != "") {
        $probs = $probs . $problem[$i] . ", ";
        $rank = $rank + $issueRank["$problem[$i]"];
      }
    }
    $probs = $probs . $_POST['other'];
    if (!empty($_POST['other'])) { $rank = $rank + 1; }

    $reg = "UPDATE `reports` SET `address`='$address', `issue`='$probs', `description`='$descFix',
    `rank`='$rank' WHERE `id`='$id'";
    if ($conn->query($reg) === TRUE) {
      header("Location: myReports.php");
    } else {
      echo "error";
      header("Location: reportsHome.html");
    }

} else {
  header("Location: reportsHome.html");
}



?>
