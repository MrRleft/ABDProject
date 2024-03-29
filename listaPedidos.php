<?php 
	
	session_start();
	require_once __DIR__.'/includes/Controller/controllerPedidos.php';
	require_once __DIR__.'/includes/TO/TOPedidos.php';

	if(!$_SESSION['login']){
		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/pedidos.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<title> Mis Pedidos</title>

</head>

<body>

	<div id="contenedor">

		<?php require ('includes/comun/header.php'); ?>
		<div class="container">
			
			<?php
							
				$listaPedidos = controllerPedidos::loadPedidos($_SESSION['nombreUsuario']);
		
						
				if($listaPedidos == null){

					echo "<p><h2> No tienes pedidos, " . $_SESSION['nombreUsuario'] ." </h2></p>";
					
				}else {
					echo " <h2 class=nota> Esta es la página donde puedes visualizar tus pedidos, ".  $_SESSION['nombreUsuario'] .  ". </h2>";
					

					$numero = sizeof($listaPedidos);
					if($numero == 0){
						echo "<div class ='espaciado'><h1><ul><span id=radius>Aun no has realizado ningun pedido</span></h1></div>";

					}else{
						echo "<div class ='espaciado'><h1><ul><span id=radius>Tus pedidos son los siguientes:</span> </h1></div>";

					}
					
					for ($i = 0; $i < $numero; $i++) {
						
						$pedido = $listaPedidos[$i];

					    echo "<h2><li><a id='pedido' href = mostrarPedido.php?idPedido=" . $pedido->getIdPedido() . ">Id del pedido: " . $pedido->getIdPedido() . "</a></li></h2>";
					    
					    $estado = $pedido->getEstado();
					    echo "<p id=state>Su estado es :<span id=radius> $estado</span><p>";	
					}
					echo "</ul>";
				}


			?>
		
		</div>

		<?php require('includes/comun/footer.php'); ?>

	</div>

	

</body>
</html>
