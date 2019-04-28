<?php 

	session_start();
	require_once __DIR__.'/includes/Controller/controllerPedidos.php';
	require_once __DIR__.'/includes/TO/TOPedidos.php';
	require_once __DIR__.'/includes/FormularioPedido.php';

	if(!$_SESSION['login']){
			header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/mostrarPedido.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<script type="text/javascript" src="js/mostrarCervezaMethods.js"></script>  
	<title>Cesta</title>

</head>

<body>

	<div id="contenedor">

		<?php require ('includes/comun/header.php'); ?>
		<div class="container">
			
			<?php
				$pedido = null;

				if(isset($_GET['idPedido'])){
					$pedido = controllerPedidos::loadPedido($_GET['idPedido']);
				}else {
					echo "<div><p>Error: No se ha seleccionado el pedido</p></div>";
				}

						
				if($pedido == null){
					if(isset($_GET['idPedido'])){
						echo "<div><p>Error: El pedido " . $GET['idPedido'] . " no existe o no se ha encontrado<p></div>";
					}
				}else {

					if(sizeof($pedido->getCervezas()) > 0) {
						$cervezas = $pedido->getCervezas();
						$unidades = $pedido->getUnidades();
						$i = 0;
						$total = 0;

						echo "<div class='infoPedido'>";
						echo "<h2> DATOS GENERALES DEL PEDIDO </h2>";
						echo "<p> Id del pedido: " . $_GET['idPedido'] . "</p>";
						echo "<p> Su estado es: " . $pedido->getEstado() . "</p>";
						echo "<p> Fecha pedido: " . $pedido->getFechaPedido() . "</p>";
						echo "<p> Dirección de entrega: " . $pedido->getDir() . "</p>";
						echo "</div>";

					}else {
						echo "<div><h2>Error: El pedido no tiene ninguna cerveza.<h2></div>";
					}
				}
			?>
		
		</div>

		<?php require('includes/comun/footer.php'); ?>

	</div>
	

</body>
</html>