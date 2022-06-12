<?php 	



require_once 'core.php';

$sql = "SELECT id_ped, cliente, telefono, fecha, productos, estado, total FROM pedido
		WHERE estado_pedi = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
 	

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	  <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	  <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	</ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

		$total = '$'.$row[6]; 

 	$output['data'][] = array( 		
 		// id
 		$productId,
 		// client name
 		$row[1], 
 		// telefono
		 $row[2],
 		// fecha 
 		$row[3], 		 	
 		// productos
 		$row[4],
		 // category 
		 $total,
 				
 	    $row[5],
 		// active
		

 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);