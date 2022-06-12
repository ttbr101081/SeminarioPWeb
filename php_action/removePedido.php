<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$id_ped = $_POST['id_ped'];

if($id_ped) { 

 $sql = "UPDATE pedido SET estado = 'Entregado', estado_pedi = 2 WHERE id_ped = {$id_ped}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST