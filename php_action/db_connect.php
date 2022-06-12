<?php 	

$localhost = "bioevlsoxoji8ey3abaq-mysql.services.clever-cloud.com";
$username = "uhpdzh2q9o3ki1rt";
$password = "8Vb22UR7grPDpHuEzsif";
$dbname = "bioevlsoxoji8ey3abaq";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>