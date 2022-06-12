<?php 	

session_start();

require_once 'db_connect.php';

    require('../../base/conex.php');
        if(isset($_SESSION['cedu'])){
            $cedula = $_SESSION['cedu'];
            $sql = "select nom_cli, ape_cli, tele_cli from cliente where ced_cli = '$cedula'";
            $r = mysqli_query($l, $sql);
            while($registro = mysqli_fetch_object($r)){
                $nombre = $registro->nom_cli;
                $apellido = $registro->ape_cli;
                $telefono = $registro->tele_cli;
            }
            $cliente = $nombre.' '.$apellido;
        }

		if(isset($_GET['total'])){
			$total = $_GET['total'];
			$info = $_GET['info'];
			echo 'Total: '.$total;
			echo 'Productos: '.$info;
			echo $cliente;
		}
		$fecha=date('Y-m-d');
    
		$orderItemSql = "INSERT INTO pedido (cliente, telefono, fecha, productos, estado, estado_pedi, total) 
		VALUES ('$cliente', '$telefono', '$fecha','$info','Por entregar', 1, $total)";
	
		$r = mysqli_query($l, $orderItemSql) or die ("ERROR al ingresar datos");
session_destroy();

header("location:../../index.php");

?>