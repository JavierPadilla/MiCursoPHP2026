<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGO DE SALARIO DE EMPLEADOS</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
 <header>
    <h2  id="centrado"> Pago de salario de empleados</h2>
    <img src="image/empleados.jpg" alt="Empleados" width="600" height="400">
</header>
 <section>
    <?php 
    error_reporting(0);
    $empleado=htmlspecialchars($_POST['txtEmpleado']?? "") ;
    $categoria=htmlspecialchars($_POST['selCategoria']?? "");
    $horas=htmlspecialchars($_POST['txtHoras']?? "");
    if ($categoria=='Jefe'){
        $selJ='SELECTED';
    }else{
        $selJ="";
    }
    if ($categoria=='Administrativo'){
        $selA='SELECTED';
    }else{
        $selA="";
    }
    if ($categoria=='Operario'){
        $selO='SELECTED';
    }else{
        $selO="";
    }
    if ($categoria=='Practicante'){
        $selP='SELECTED';
    }else{
        $selP="";
    }
    ?>
    <p>&nbsp;</p>
    <form action="Condicionales01.php" method="post" name="frmSalario">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width ="150">Empleado :</td>
                <td><input type="text" name="txtEmpleado" size="70" value="<?php echo $empleado;?> "></td>
            </tr>
            <tr>
                <td>Horas :</td>
                <td><input type="text" name="txtHoras" value="<?php echo $horas; ?>"></td>
            </tr>
            <tr>
                <td>Categoria : </td>
                <td><select name="selCategoria" >
                    <option value="Jefe" <?php echo $selJ; ?>>Jefe</option>
                    <option value="Administrativo" <?php $selA; ?>>Administrativo</option>
                    <option value="Operario" <?php $selO; ?>>Operario</option>
                    <option value="Practicante" <?php $selP; ?>>Practicante</option>
                </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Calcular" name="btnCalcular">
                    <input type="reset" value="Limpiar">
                </td>
            </tr>
            <?php 
            $costo=0;
            if ($categoria=='Jefe') $costo=50;
            if ($categoria=='Administrativo')$costo=30;
            if ($categoria=='Operario') $costo=15;
            if ($categoria=='Practicante') $costo=5;
            
            $salarioBruto=$costo*$horas;
            $descuento=$salarioBruto*0.12;
            $sNeto=$salarioBruto-$descuento;

            ?>
            <tr>
                <td>Salario Bruto </td>
                <td><?php echo "$ ".number_format($salarioBruto,2,'.',''); ?></td>
            </tr>
            <tr>
                <td>Descuento </td>
                <td><?php echo "$".number_format($descuento,2,'.',''); ?></td>
            </tr>
            <tr>
                <td>Sario Neto</td>
                <td><?php echo "$".number_format($sNeto,2,'.',''); ?></td>
            </tr>
        </table>
    </form>
 </section>
</body>
</html>