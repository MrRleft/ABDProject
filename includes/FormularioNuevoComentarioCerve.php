<?php
require_once __DIR__ . '/Form.php';
require_once __DIR__ . '/Controller/controllerComentarios.php';
require_once __DIR__ . '/TO/TOComentarios.php';
require_once './vendor/autoload.php';

class FormularioNuevoComentarioCerve extends Form
{

    public function generaCamposFormulario($datosIniciales)
    {

        return '	
            <fieldset>
				<legend> Añadir valoración: </legend>

    			    <input id="comentario" type="text" placeholder="Introduce aqui el comentario" name="comentario" required>
                    
                    <input type="hidden" name="idCerveza" value="' . $this->opciones['idCerveza'] . '">

    				<p><button id=addVal type="submit">Añadir valoración</button></p>

		    </fieldset>';
    }

    public function procesaFormulario($datos)
    {

        $erroresFormulario = array();

        $idUsuario = isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : null;
        if (empty($idUsuario)) {
            $erroresFormulario[] = "No se ha podido acceder al id del usuario";
        }

        $idCerveza = isset($_POST['idCerveza']) ? $_POST['idCerveza'] : null;
        if (empty($idCerveza)) {
            $erroresFormulario[] = "No se ha podido acceder al id de la cerveza";
        }

        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
        if (empty($comentario)) {
            $erroresFormulario[] = "Tienes que escribir un comentario";
        }

        if (count($erroresFormulario) === 0) {

            $mongoConnection = new MongoDB\Client("mongodb://localhost:27017");
            $document = array(
                "comentario" => $_POST['comentario'],
                "idCerveza" => $_POST['idCerveza'],
                "idUsuario" => $_SESSION['nombreUsuario']
            );
            $mongoConnection->ABDProject->Comentarios->insertOne($document);
            header('Location: mostrarCerveza.php?id=' . $idCerveza);
            exit();
        }


        if (count($erroresFormulario) > 0) { //Si hay errores devuelvo un array de errores 
            return $erroresFormulario;
        }
    }
}
