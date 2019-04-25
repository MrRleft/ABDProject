<?php
	//Este script se utiliza desde AJAX para eliminar comentarios en tiempo real
	require_once __DIR__.'/../includes/Controller/controllerComentarios.php';
	require_once __DIR__.'/../vendor/autoload.php';
	$mongoConnection = new MongoDB\Client("mongodb://localhost:27017");
	$aux = $_REQUEST['q'];
	$comments = $mongoConnection->ABDProject->Comentarios;
	$comments->deleteOne(["_id" => new MongoDB\BSON\ObjectId("$aux")]);
	return "Comentario borrado";
?>