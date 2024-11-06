
   <?php //sacamos el nombre del usuario 
   include ("conexionBD.php");
   
   $resultado = $pdo->query("Select pwd from usuarios where username like '$nombreUsuario1'");
    $contrasenaHasheada = ($resultado->fetch());
    if($contrasenaHasheada){
        echo "usuario existente";
    }
    else{
        $contraParaGuardar= password_hash($_POST['contra'],PASSWORD_DEFAULT);
        $mail=$_POST['email'];
        $sql="INSERT INTO usuarios (username,pwd,mail) values ('$nombreUsuario1','$contraParaGuardar','$mail')";
        $pdo->prepare($sql)->execute();
        echo "registro completado";
    }
    ?>