<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de empleados</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h3 id="centrado">Pago de empleados</h3>
    </header>
    <section>
        <form action="Logica02.php" method="POST" name="frmPago">
            <table>
                <tr>
                    <td width="200">Nombre del empleado:</td>
                    <td><input type="text" name="txtNombre"  size="70" required></td>
                </tr>
                <tr>
                    <td>Horas trabajadas:</td>
                    <td><input type="number" name="txtHoras" required></td>
                </tr>
                <tr>
                    <td>Pago por hora:</td>
                    <td><input type="number" name="txtPagoHora" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td >
                        <input type="submit" value="Calcular pago">
                        <input type="reset" value="Limpiar">
                    </td>
                </tr>
                <?php

                if ($_POST) {
                    $nombre = htmlspecialchars($_POST['txtNombre']);
                    $horas = htmlspecialchars($_POST['txtHoras']);
                    $pagoHora = htmlspecialchars($_POST['txtPagoHora']);

                    $pagoTotal = $horas * $pagoHora;
                    $descuentoEssalud = $pagoTotal * 0.12;
                    $descuentoAFP = $pagoTotal * 0.10;
                    $sueldoNeto = $pagoTotal - $descuentoEssalud - $descuentoAFP;

                }
                ?>
                <tr>
                    <td colspan="2">
                        <?php
                        if ($_POST) {
                            echo "<h4>Resumen del pago:</h4>";
                            echo "<p>Nombre del empleado: $nombre</p>";
                            echo "<p>Horas trabajadas: $horas</p>";
                            echo "<p>Pago por hora: $pagoHora</p>";
                            echo "<p>Total a pagar: S/. $pagoTotal</p>";
                            echo "<p>Descuento ESSALUD (12%): S/. $descuentoEssalud</p>";
                            echo "<p>Descuento AFP (10%): S/. $descuentoAFP</p>";
                            echo "<p>Sueldo neto a recibir: S/. $sueldoNeto</p>";
                        }
                        ?>
                    </td>
            </table>
        </form>
    </section>
    <footer>
        <h6 id="centrado">Derechos reservados &copy; 2024</h6>
        <h6 id="centrado">Autor: Ingeniero Javier Padilla</h6>
        <h6 id="centrado">Fecha: 20/06/2024</h6>
        </footer>
</body>
</html>