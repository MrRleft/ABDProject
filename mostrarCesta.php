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
	<script type="text/javascript" src="js/javascript.js"></script>
	<script type="text/javascript" src="js/mostrarCervezaMethods.js"></script>  
	<title>Mi cesta</title>
</head>

<body>

	<div id="contenedor">

		<?php require ('includes/comun/header.php'); ?>
		<div class="container">
			
			<?php
				$cesta = controllerPedidos::loadCesta($_SESSION["nombreUsuario"]);

				if(isset($_POST['Eliminar'])){
					controllerPedidos::eliminarCesta($cesta->getIdPedido());
					$cesta = null;
				}
				if($cesta == null){
					echo "<div><h1>Tu cesta está vacía.<h1></div>";
				}else {
					//$cesta = controllerPedidos::loadPedido($idCesta);
					foreach ($cesta->getCervezas() as $idCerveza) {
						if(isset($_POST[$idCerveza])){
							controllerPedidos::eliminarElementoCesta($idCerveza, $cesta->getIdPedido());
							$cesta = controllerPedidos::loadPedido($cesta->getIdPedido());
						}
					}
					if($cesta == null){
						echo "<div><h1>Tu cesta está vacía.<h1></div>";
					}
					else if(sizeof($cesta->getCervezas()) > 0) {
						$cervezas = $cesta->getCervezas();
						$unidades = $cesta->getUnidades();
						$i = 0;
						$total = 0;
						echo "<div id='infoBeer'><p>Cargando la cesta</p></div>";
						foreach ($cervezas as $idCerveza) {
							echo "	<script>
									AddBeerTolist(".$idCerveza.");
									</script>";
						}
						foreach ($unidades as $unids) {
							echo "	<script>
									AddUnitsTolist(".$unids.");
									</script>";
						}
						sleep(0.1);
						echo "	<script>
									var total = GetTextBeerToListCesta();
								</script>";
						?>
						<button class='submit' onclick="myFunction()">Comprar la cesta</button>
							<div id="procesarCesta">

								<?php 
									$opciones = array();

									$formulario = new FormularioPedido("formPed", $opciones);
									$formulario->gestiona();

								?>

							</div> 
						<?php
					}else {
						controllerPedidos::eliminarCesta($cesta->getIdPedido());
						echo "<div><h1>Tu cesta está vacía.<h1></div>";
					}
				}
			?>
		
		</div>

		<?php require('includes/comun/footer.php'); ?>

	</div>

</body>
</html>
