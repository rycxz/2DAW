 <?php
 session_start();
 if(isset($_POST['votado'])){
 setcookie("fruta",$_POST['fruta'],time()+600);  
 header("Location:ejericicio5.php");
 }
 
 $_SESSION($_POST['fruta'])= $_SESSION($_POST['fruta'])+1;
 
 print_r($_SESSION);
 header("Location : ");
 

    
        
        
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta: Fruta Favorita</title>
</head>
<body>
    <h2>¿Cuál es tu fruta favorita?</h2>

    <form action="ejericicio5Votado.php" method="post">
        <input type="radio" id="manzana" name="fruta" value="manzana" required <?php if($fruta=='manzana'){echo 'checked';}?>>
        <label for="manzana">🍎 Manzana</label><br>

        <input type="radio" id="platano" name="fruta" value="platano" required <?php if($fruta=='platano'){echo 'checked';}?>>
        <label for="platano">🍌 Plátano</label><br>

        <input type="radio" id="fresa" name="fruta" value="fresa" required <?php if($fruta=='fresa'){echo 'checked';}?>>
        <label for="fresa">🍓 Fresa</label><br>

        <input type="radio" id="pina" name="fruta" value="pina" required <?php if($fruta=='pina'){echo 'checked';}?>>
        <label for="pina">🍍 Piña</label><br>

        <input type="radio" id="uva" name="fruta" value="uva" required <?php if($fruta=='uva'){echo 'checked';}?>>
        <label for="uva">🍇 Uva</label><br>

        <input type="radio" id="naranja" name="fruta" value="naranja"required <?php if($fruta=='naranja'){echo 'checked';}?>>
        <label for="naranja">🍊 Naranja</label><br>

        <input type="radio" id="sandia" name="fruta" value="sandia"required <?php if($fruta=='sandia'){echo 'checked';}?>>
        <label for="sandia">🍉 Sandía</label><br>

        <input type="radio" id="durazno" name="fruta" value="durazno"required <?php if($fruta=='durazno'){echo 'checked';}?>>
        <label for="durazno">🍑 Durazno</label><br><br>
 
          <input type="submit" name="votado" value="Votar" <?php if(isset($_COOKIE['fruta'])){echo 'disabled';} ?>> 
 
    </form>
</body> 
</html
