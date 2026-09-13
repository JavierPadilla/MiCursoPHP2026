<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obsequio de clientes</title>
</head>
<body>
    <header>
        <h3 id="centrado">Obsequio de clientes</h3>
        <img src="image/obsequio.jpg" alt="Obsequio" width="600" height="400">
        </header>
        <?php
        $monto="";
        $cliente="";
        $ticket=0;
        if ($_POST){
        error_reporting(0);
        $cliente=htmlspecialchars($_POST['txtCliente']??"");
        $monto=htmlspecialchars($_POST['txtMonto']?? "");
        $ticket=htmlspecialchars($_POST['txtNumero']??0);
        }
        ?>
        <section>
            <form name="FrmnObsequio" method ="POST" action="Condicionales02.php"></form>
                <table border="0" width="550" cellpadding="0" cellspacing="0" aling= "center">
                    <tr>
                        <td>Nombre del cliente</td>
                        <td><input type="text" name ="txtCliente"  size ="60" value="<?php echo $cliente ;?>" placeholder="Ingrese nombre del cliente"></td>
                    </tr>
                    <tr>
                        <td>Monto Total</td>
                        <td><input type="text" name ="txtMonto" value="<?php echo $monto?>" placeholder="Ingrese el monto total" ></td>
                    </tr>
                    <tr>
                        <td>numero de ticket</td>
                        <td><input type="text" name ="txtNumero" value?="<?php echo $ticket ?>" placeholder="Ingrese el numero de Ticket obtenido"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Procesar" ></td>
                    </tr>
                    <?php
                    if($ticket==4) echo"<br> Suertudo Ganaste";
                    ?>

                </table>
        </section>
    
</body>
</html>