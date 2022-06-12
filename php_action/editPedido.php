<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$id_ped = $_POST['id_ped'];
	$cliente 		= $_POST['editPedidoName']; 
  $telefono			= $_POST['editTelefono'];
  $fecha 					= $_POST['editFecha'];
  $productos			= $_POST['editProductos'];
  $estado 	= $_POST['editEstado'];
  $total 	= $_POST['editTotal'];

				
	$sql = "UPDATE pedido SET cliente = '$cliente', telefono = '$telefono', fecha = '$fecha', productos = '$productos', estado = '$estado', total = '$total', estado_pedi = 1 WHERE id_ped = $id_ped ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
