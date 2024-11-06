<?php
	if(isset($_COOKIE['fruta'])){
		$fruta = $_COOKIE['fruta'];
	}else{
		$fruta ="ninguna";
	}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu fruta favorita</title>
</head>
<body>
    <h1>¿Cuál es tu fruta favorita?</h1>
    <form action="ej5.php" method="post">
        <label>
            <input type="radio" name="fruta" value="manzana" required <?php if($fruta=="manzana"){echo "checked";} ?> >
            Manzana
        </label><br>

        <label>
            <input type="radio" name="fruta" value="plátano" <?php if($fruta=="plátano"){echo "checked";} ?>>
            Plátano
        </label><br>

        <label>
            <input type="radio" name="fruta" value="naranja" <?php if($fruta=="naranja"){echo "checked";} ?>>
            Naranja
        </label><br>

        <label>
            <input type="radio" name="fruta" value="fresa" <?php if($fruta=="fresa"){echo "checked";} ?>>
            Fresa
        </label><br>

        <label>
            <input type="radio" name="fruta" value="uva" <?php if($fruta=="uva"){echo "checked";} ?>>
            Uva
        </label><br>

        <input type="submit" name="votado" value="Enviar" <?php if($fruta!="ninguna"){echo "disabled"; } ?>>
    </form>
</body>
</html>
