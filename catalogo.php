<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <script src="js/cargarCatalogo.js"></script>  
    <head>
        <title>Catálogo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" href="css/catalogo.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    </head>
    <body> 
        <div id="contenedor">
            <?php require('./includes/comun/header.php'); ?>
            <div class="container">
     
                <div id="filtro"></div>

            </div> <!-- Cierre de container -->    
            <?php require('./includes/comun/footer.php'); ?>    
        </div>
    </body>
</html>
