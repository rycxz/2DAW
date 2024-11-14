 
<?php
include "conexionBD.php" ;
switch($_POST['accion']){
    case null:
        header("Location:ejemploBD.php");
        break;
        case "aniadir":
            include("aniadir.html");
            break;
            case "modificar":
                include("modificar.html");
                break;
                case "borrar":
                    include("borrar.html");
                    $idReceta=$_POST['receta'];
                    $statement =$pdo ->prepare("Delete from recetas where id=$idReceta");
                    $statement->execute();
                    header("Location: redi.php");
                    break;
}
 
?>