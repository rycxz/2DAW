<?php
session_start();
ob_start();

// Verificar si el usuario está loggeado
if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
    //hago los includes si esta logged
    $datosUsuario = $_SESSION['usuarioCompleto'];
    include_once "../../modelo/ingrediente.php";
    include_once "../../modelo/receta.php";

    // Validar si el usuario es administrador
    if (($_SESSION["loggeado"] === true && $_SESSION["nombreUsuario"] === $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1)) {
        include_once "../../vistas/recetas/aniadirIngredienteReceta.php";
        // si el post que me llega es de añadir un ingrediente
        if(isset($_POST['receta'])){
                // me saco el nombre de la receta del get
                if(isset($_GET['receta'])){
                    $recteaId= $_GET['receta'];
                }

            // saco toda la  receta
            $receta=obtenerRecetaNombre($recteaId);
            // saco todos los ingredientes de la receta
            $ingredientesReceta =obtenerTodosLosIngredientes();

            //comprobacion si el ingrediente etsa ya en la receta
            $ingredientesRecetaBuscar = obtenerIngredientesReceta($receta['id']);
            // saco los ingrediente de la receta ene sopecfico

            // si la receta no tiene ingredientes
           if($ingredientesRecetaBuscar == false){
            // compruebo si el post esta vacio y me la guardo
            if(isset($_POST['ingrediente'] ,$_POST['cantidad']  ,$_POST['medida_unidad'])){
                insertarIngredienteReceta( $receta['id'],$_POST['ingrediente']  ,$_POST['cantidad']  ,$_POST['medida_unidad'] );
                header("Location:../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=$recteaId");
                exit();
                //si  esta lleno compruebo ue no este dupilcado
           }}else{
            $ingredienteDuplicado = false;

            // Verificar si el ingrediente ya existe
            foreach ($ingredientesRecetaBuscar as $ingrediente) {
                $idComprar = $_POST['ingrediente'];
                // recooro y si coince lo mando a la pagina devuelta
                if ($idComprar ==  $ingrediente['id_ingrediente'])  {

                    $ingredienteDuplicado = true;
                  break;


                }}
                if($ingredienteDuplicado){
                    header("Location:../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=$recteaId&ingredienteDuplicado=true&");


                    exit();
                }
               else {
                    // si no esta dentro de la receta lo añado
                    insertarIngredienteReceta( $receta['id'],$idComprar  ,$_POST['cantidad']  ,$_POST['medida_unidad'] );
                    header("Location:../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=$recteaId");

                    exit();

                }

           }

           }





   //diferenciaen el tipo de post ue me llega

        //si quiere añadir un ingrediente
        if(isset($_POST['ing'])){
            //me guardo el get para parasrlo a la pagina

            $recteaId= $_GET['receta'];
            // saco el ide del ingrediente
            $nombreIngrediente = $_POST['ingrediente'];
            // sao todos los ingredientes
            $ingredientes = obtenerTodosLosIngredientes();

            $ingredienteDuplicado = false;

            // verifico  si el ingrediente ya existe
            foreach ($ingredientes as $ingrediente) {
                // hago una variable para comparar el nombre del ingrediente
                $nombreParaComparar = $ingrediente['nombre'];
                if (strcasecmp($nombreParaComparar, $nombreIngrediente) === 0) {
                    // si lo encuentra le pongo true
                    $ingredienteDuplicado = true;
                    break;
                }

            }
            if ($ingredienteDuplicado) {
                // si es true entra aqui y lo mando a la pagina anterior con un menjssaje de error

                header("Location:../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=$recteaId&ingredienteDuplicado=true&");
                exit();
            } else {
                insertarIngrediente($nombreIngrediente);
                    // si lo añade, me envio para la pagina anterior para que lo pueda añadrir a la receta
                    header("Location:../../../controlador/controladoresRecetas/controladorIngredientesRecetaNueva.php?receta=$recteaId");

                    exit();

            }
        }

        if(isset($_POST['fin'])){
            header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
            exit();
        }
    }


        }else {
    // Redirigir al usuario si no está loggeado
    header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
    exit();
}
?>
