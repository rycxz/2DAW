<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
        }
        .total-amount {
            font-weight: bold;
        }
        .checkout-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border: none;
            cursor: pointer;
        }
        .checkout-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h1 style="text-align: center;">Carrito de Compras</h1>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
    <tr>
            <td name="productos">Producto: </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td name="productos">Producto: </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td name="productos">Producto: </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="total">Total:</td>
            <td class="total-amount">$57.50</td>
        </tr>
    </tfoot>
</table>

<button class="checkout-btn">Proceder al pago</button>

</body>
</html>
