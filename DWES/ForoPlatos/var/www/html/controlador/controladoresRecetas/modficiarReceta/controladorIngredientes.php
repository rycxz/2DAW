<?php
session_start();

// Verificar si el usuario está loggeado
if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    $datosUsuario = $_SESSION['usuarioCompleto'];

    // Validar si el usuario es administrador
    if ($_SESSION["loggeado"] === true && $_SESSION["nombreUsuario"] === $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
        include "../../../modelo/ingrediente.php";

        // Caso 1: Añadir ingrediente
        if (isset($_POST['AniadirIng'])) {
            if (isset($_POST['ingredienteEntrada']) && !is_numeric($_POST['ingredienteEntrada'])) {
                $receta = $_SESSION["receta"];
                $nombreIngrediente =   $_POST['ingredienteEntrada']; // Evitar espacios extras
                $ingredientesReceta = obtenerIngredientesReceta($receta['id']);

                $ingredienteDuplicado = false;

                // Verificar si el ingrediente ya existe
                foreach ($ingredientesReceta as $ingrediente) {
                    $nombreParaComparar = sacarNombreIngrediente($ingrediente['id_ingrediente']);
                    if (strcasecmp($nombreParaComparar, $nombreIngrediente) === 0) {
                        $ingredienteDuplicado = true;
                        break;
                    }
                }

                if ($ingredienteDuplicado) {
                    header("Location: ../../../controlador/controladoresRecetas/modificarRecetaControlador.php?existeIngrediente=true");
                    exit();
                } else {

                    insertarIngrediente($nombreIngrediente);

                    $idIngrediente =  sacarIdPorNombre($nombreIngrediente);

                    insertarIngredienteReceta(
                        $receta['id'],
                        $idIngrediente,
                        $_POST['cantidad'],
                        $_POST['unidadMedida']
                    );
                    header ("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
                    exit();
                }
            } else {
                header("Location: ../../../controlador/controladoresRecetas/modificarRecetaControlador.php?contieneNumeros=true");
                exit();
            }
        }

        // Caso 2: Guardar cambios
        if (isset($_POST['eliminarIngrediente'])) {

          $idIngrediente = $_POST['eliminarIngrediente'];

          if (is_numeric($idIngrediente)) {
              $recetaId = $_SESSION['receta']['id'];
              borrarIngrediente($idIngrediente, $recetaId);

              header ("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
              exit();
          } else {
              header("Location: ../../../controlador/controladoresRecetas/modificarRecetaControlador.php?errorEliminar=true");
              exit();
          }

            // Redirigir tras guardar los cambios
            $_SESSION['receta'] = "";
            $_SESSION['ingReceta'] = "";
            header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php?modificarReceta=modificadaConExito");
            exit();
        }
    }
} else {
    // Redirigir al usuario si no está loggeado
    header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
    exit();
}
?>
