<?php

$dbhost = "sql200.epizy.com";
$dbuser = "epiz_28227108";
$dbpass = "oHMwN1a0Xu";
$dbname = "epiz_28227108_cypress";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

    die("failed to connect");
}
