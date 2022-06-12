<?php 	

require_once 'core.php';

$pedidoId = $_POST['pedidoId'];

$sql = "SELECT id_ped, cliente, telefono, fecha, productos, estado, estado_pedi, total FROM pedido WHERE id_ped = $pedidotId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);