<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h3 id="centrado">Venta de productos</h3>
    </header>
    <section>
        <form action="Logica03.php" method="POST" name="frmVenta">
            <table>
                <tr>
                    <td width="200">Nombre del producto:</td>
                    <td><input type="text" name="txtProducto" size="70" required></td>
                </tr>
                <tr>
                    <td>Precio unitario:</td>
                    <td><input type="number" name="txtPrecio" required></td>
                </tr>
                <tr>
                    <td>Cantidad vendida:</td>
                    <td><input type="number" name="txtCantidad" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td >
                        <input type="submit" value="Calcular venta">
                        <input type="reset" value="Limpiar">
                    </td>
                </tr>
                <?php
                define ('DESCUENTO', 0.10); // Definimos una constante para el descuento del 10%
                if ($_POST) {
                    $producto = htmlspecialchars($_POST['txtProducto']?? "");
                    $precio = htmlspecialchars($_POST['txtPrecio']?? 0);
                    $cantidad = htmlspecialchars($_POST['txtCantidad']?? 0);

                    $totalVenta = $precio * $cantidad;
                    $descuento = 0;
                    if ($totalVenta > 1000) {
                        $descuento = $totalVenta * DESCUENTO; // 10% de descuento
                    }
                    $totalFinal = $totalVenta - $descuento;
                }
                ?>
                <tr>
                    <td colspan="2">
                        <?php
                        if ($_POST) {
                            echo "<h4>Resumen de la venta:</h4>";
                            echo "<p>Nombre del producto: $producto</p>";
                            echo "<p>Precio unitario: S/. $precio</p>";
                            echo "<p>Cantidad vendida: $cantidad</p>";
                            echo "<p>Total de la venta: S/. $totalVenta</p>";
                            echo "<p>Descuento aplicado: S/. $descuento</p>";
                            echo "<p>Total final a pagar: S/. $totalFinal</p>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
    </section>
    <footer>
        <h6 id="centrado">Derechos reservados &copy; 2024</h6>
        <h6 id="centrado">Desarrollado por: [Ing. Javier Padilla]</h6>
        <h6 id="centrado">Contacto: [javier.padilla@universidad.edu.pe]</h6>
    </footer>
</body>
</html>