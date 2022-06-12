<?php 	



require_once 'core.php';

$sql = "SELECT id_cli, nom_cli, ape_cli, corre_cli, tele_cli, direc_cli, ced_cli from cliente";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$clienteId = $row[0];


	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }


 	$output['data'][] = array( 		
 		// client id
 		$clienteId,
		// client ced
		$row[6],
 		// client name
 		$row[1], 
 		// client ape
 		$row[2],
 		// client email 
 		$row[3], 		 	
 		// client phone
 		$row[4],
 		// client dire		
 		$row[5],
 		// active		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);