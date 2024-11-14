 
<?php
/*
Simula un carrito de compras en una página web. 
Crea un listado de productos (puedes usar un array) 
	y permite al usuario "agregar" productos al carrito. 
Utiliza sesiones para almacenar los productos agregados 
	y muéstralos en una página separada.
*/
session_start();

if(isset($_POST['producto'])){
	if(isset($_SESSION[$_POST['producto']])){
		$_SESSION[$_POST['producto']] = $_SESSION[$_POST['producto']] +1;
	}
	else{
		$_SESSION[$_POST['producto']] = 1;
	}	
}
$productos=[
	"osos"=>["precio"=>3.5,"imagen"=>"osos.jpg"],
	"caramelos"=>["precio"=>1.5,"imagen"=>"caramelos.jpg"],
	"grageas"=>["precio"=>2,"imagen"=>"grageas.jpg"],
	"lacasitos"=>["precio"=>100,"imagen"=>"lacasitos.jpg"],
	"surtido"=>["precio"=>3,"imagen"=>"surtido.jpg"],
	"papas"=>["precio"=>4,"imagen"=>"papas.jpg"]
];

echo('
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
        <h1>Listado de Productos</h1>
        <div class="product-list">
');
foreach($productos as $producto => $datos){
	echo ('<div class="product">');
	echo ("<img src='{$datos['imagen']}' alt='$producto'>");
	echo ("<h2>$producto</h2>");
	echo ("<p>Precio: {$datos['precio']}€</p>");
?>
	<form action="ej4.php" method="post">
		<input type="hidden" name="producto" value="<?php echo $producto ?>">
		<input class="add-to-cart" type="submit" value="Añadir">
	</form>
	</div>
<?php
	}
echo('</div><br><ul style="
list-style-type: none;
 padding: 0;
 margin: 0;
 position: absolute;
 right: 0;
 top: 20px;
 background-color: #f4f4f4;
 border: 1px solid #ccc;
 border-radius: 5px;
">');
$totalCarrito=0;
foreach($_SESSION as $producto => $cantidad){
	$total = $productos[$producto]['precio']*$cantidad;
	echo("<li> $producto: $cantidad  $total €</li>");
	$totalCarrito=$totalCarrito+$total;
}
echo("
<li> Total: $totalCarrito € </li>
</ul>
</div>
</body>
");
 
?>