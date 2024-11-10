       <!--
       <?php 
                     //idea 01: si el pructo es selecionado con el boton se añade a un array para gurdarlo
              
                if (isset($_POST['producto'])) {
                    $productoSeleccionado = $_POST['producto'];
                
                }
                    if (!isset($_SESSION['carrito'])) {
                        $_SESSION['carrito'] = array();
                    }
                
                    // Añadir el producto seleccionado al carrito de la sesión
                    $_SESSION['carrito'][$productoSeleccionado] = $ArrayProdcutos[$productoSeleccionado];
                
                    // Redirigir al usuario a la misma página (para evitar reenvíos del formulario)
                    header("Location: cart.php");
                ?>
                -->