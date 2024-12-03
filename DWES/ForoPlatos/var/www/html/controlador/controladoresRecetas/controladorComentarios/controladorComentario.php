<?php
session_start();
include  ("../../../controlador/controadoresUsuarios/sesion.php");
include "../../../modelo/comentarios.php";
control();

  if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {

    $datosUsuario = $_SESSION['usuarioCompleto'];

    if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
        if (isset($_POST['cnPapa'])){

            $comentario = $_POST['respuesta'];
            $idComentarioRespuesta = $_POST['id_comentario_respuesta'];
            $idReceta = $_POST['id_receta'];
            $idUsuario = $_POST['id_usuario'];
            insetarComentariosConPapa($idReceta, $idUsuario, $idComentarioRespuesta, $comentario);
        }
        else if (isset($_POST['Comentar'])){
            $valoracion = $_POST['valoracion'];
            $comentario = $_POST['comentario'];
            $idComentarioRespuesta = null;
            $idReceta = $_POST['idRecetaComentada'];
            $idUsuario = $_POST['idUsuarioComenta'];
            insetarComentariosConValo($idReceta, $idUsuario, $comentario, $valoracion);
        }
        if(isset($_POST['eliminarComentario'])){

            $idComentario = $_POST['id_comentario_eliminar'];
            borrarComentario($idComentario);

        }




        header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
        exit();

        }
else if ( (($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] )) {
    if (isset($_POST['cnPapa'])){

        $comentario = $_POST['respuesta'];
        $idComentarioRespuesta = $_POST['id_comentario_respuesta'];
        $idReceta = $_POST['id_receta'];
        $idUsuario = $_POST['id_usuario'];
        insetarComentariosConPapa($idReceta, $idUsuario, $idComentarioRespuesta, $comentario);
    }
    else if (isset($_POST['Comentar'])){
        $valoracion = $_POST['valoracion'];
        $comentario = $_POST['comentario'];
        $idComentarioRespuesta = null;
        $idReceta = $_POST['idRecetaComentada'];
        $idUsuario = $_POST['idUsuarioComenta'];
        insetarComentariosConValo($idReceta, $idUsuario, $comentario, $valoracion);
    }



    header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
    exit();
}

}
  else{

  //aqui mostrar el apartado de una receta si no estas registrado
  header("Location: ../../../controlador/controladorIndex/redireccionesIndex.php");
  exit();
}

?>
