<? 
$pdo = new PDO("mysql:host=mysql-db;dbname=daw","admin","admin");

    $nombreUsuario1 = $_POST['nombreUsuario'];
    $_SESSION['usuario']= $nombreUsuario1;
    if(isset($_POST['iS'])){

    $obtenerContra = $pdo-> query("select pwd from usuario where username like" .$nombreUsuario1);
    $contrasenaHasheada = $obtenerContra->fetch();

    if($contrasenaHasheada){
        $contrasenaHasheada= $contrasenaHasheada['pwd'];
        echo"el usuario si que existe";
        //dos variantes is la contra es por defecto o no 

       //si es por defecto
       if($contrasenaHasheada=="CAMBIAME"){
        header("Location : cambio.php");

       }else{
        $pwdComprobar = $_POST['contra'];
        if(password_verify($pwdComprobar,$contrasenaHasheada)){
            session_start();
            $_SESSION['loged']=true;
            header("Location:ventanaUsuario.php");
        }
        else{
            echo"la constraseña es incorrecta";
        }
       }



    }else{
        echo"usuario no encontrado";
    }
}elseif(isset($_POST['loged'])){
  header("Location: registro.php");
}
elseif(isset($_POST['cambioPWD'])){
    header("Location: cambio.php ");
}
else{
    http_response_code(403);
}










?>