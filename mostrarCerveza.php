<?php 
	session_start();
	require_once __DIR__.'/includes/TO/TOCervezas.php';
	require_once __DIR__.'/includes/Controller/controllerCervezas.php';
	require_once __DIR__.'/includes/TO/TOComentarios.php';
	require_once __DIR__.'/includes/Controller/controllerComentarios.php';
	require_once __DIR__.'/includes/FormularioNuevoComentarioCerve.php';
	
	global $sql;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/mostrarCerveza.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<script type="text/javascript" src="js/deleteComent.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
	<script src="js/mostrarCervezaMethods.js"></script>  
	<meta charset="utf-8">	
	<title>Cervezas</title>
	
	<script>
		var $_GET = <?php echo json_encode($_GET); ?>;
		CheckIfBeerExists($_GET['id']);
	</script>  
</head>
<body>
	<div id="contenedor"> <!-- Contenedor-->
		<?php require ('includes/comun/header.php'); ?>

		<div class="container"><!--bloque del contenido central-->	
			
			<div id="infoBeer"></div>
			<div id="buyDiv"><?php	
			if(isset($_SESSION['login']) && $_SESSION['login']){
				echo '<form  action="includes/procesarCesta.php" method="GET">';			
				echo '<input type="number" id=number name="unidades" min="1" placeholder="Unidades">';
				echo '<button class="submit" type="submit" name="cerveza" value="'. $_GET['id'].'">Añadir a la cesta</button>';
				echo '</form>';
			}
			?></div>

		</div><!-- Fin del container -->

		<?php require('includes/comun/footer.php'); ?>

	</div> <!-- Fin del contenedor -->
		

</body>
</html>