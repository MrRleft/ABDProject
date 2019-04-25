<?php
session_start();
require_once __DIR__ . '/includes/TO/TOCervezas.php';
require_once __DIR__ . '/includes/Controller/controllerCervezas.php';
require_once __DIR__ . '/includes/TO/TOComentarios.php';
require_once __DIR__ . '/includes/Controller/controllerComentarios.php';
require_once __DIR__ . '/includes/FormularioNuevoComentarioCerve.php';
require_once __DIR__ . '/vendor/autoload.php';
global $sql;
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/mostrarCerveza.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css" />
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
	<div id="contenedor">
		<!-- Contenedor-->
		<?php require('includes/comun/header.php'); ?>

		<div class="container">
			<!--bloque del contenido central-->

			<div id="infoBeer"></div>
			<div id="buyDiv"><?php
								if (isset($_SESSION['login']) && $_SESSION['login']) {
									echo '<form  action="includes/procesarCesta.php" method="GET">';
									echo '<input type="number" id=number name="unidades" min="1" placeholder="Unidades">';
									echo '<button class="submit" type="submit" name="cerveza" value="' . $_GET['id'] . '">Añadir a la cesta</button>';
									echo '</form>';
								}
								?></div>
			<div id="valoraciones">
				<?php
				$mongoConnection = new MongoDB\Client("mongodb://localhost:27017");
				$query = array('idCerveza' => $_GET['id']);
				$cursor = $mongoConnection->ABDProject->Comentarios->find($query);
				$noComments = true;
				foreach ($cursor as $doc) {

					if ($noComments)
						echo "<p id='titleComment'><span id='spanTitle'>Comentarios:</span></p>";
					$noComments = false;
					echo "<div id='showComment'>";
					echo "<p id = 'autorComent'><span id='spanId'>" . $doc["idUsuario"] . "
						</span></p>";
					echo "<p id = 'coment'>" . $doc["comentario"] . "</p>";
					if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] == $doc["idUsuario"])
						echo '<input type="button" id="myBtn" onclick='."deleteVal('" . $doc["_id"] . "')".' value="Eliminar valoración">';
					echo "</div>";
				}

				?>
			</div>

			<div id="addComment">
				<?php
				if (isset($_SESSION['login']) && $_SESSION['login']) {
					$mongoConnection = new MongoDB\Client("mongodb://localhost:27017");
					$query = array('idCerveza' => intval($_GET['id']), 'idUsuario' => $_SESSION['nombreUsuario']);
					$cursor = $mongoConnection->ABDProject->Comentarios->find($query);
					$checker = iterator_to_array($cursor);
					if (!isset($checker[0])) {
						$opciones = array();
						$addToForm = array('idCerveza' => $_GET['id']);
						$opciones = array_merge($addToForm, $opciones);
						$formulario = new FormularioNuevoComentarioCerve("FormularioNuevoComentarioCerve", $opciones);
						$formulario->gestiona();
					} else
						echo "<p>Ya has valorado esta cerveza! Si quieres volver a valorarla necesitas eliminar tu valoración anterior</p>";
				}

				?>

			</div>
		</div><!-- Fin del container -->


		<?php require('includes/comun/footer.php'); ?>

	</div> <!-- Fin del contenedor -->


</body>

</html>