<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title></title>
 <link href="estilo.css" rel="stylesheet">
</head>
<body>
 <header>
 <?php require('encabezado.php'); ?>
 </header>
 <section>
 <?php
 error_reporting(0);
 require('captura.php');
 $usuario= getUsuario();
 $clave= getPassword();
 ?>
 <form action="principal.php" method="POST">
 <table border="1" width="550"
 cellspacing="1" cellpadding="1">
 <tr>
 <td>Usuario</td>
 <td>
 <select name="selUsuarios">
 <option value="Administrador">Administrador</option>
 <option value="Sistemas">Sistemas</option>
 <option value="Operador">Operador</option>
 </select>
 </td>
 </tr>
 <tr>
 <td>Password</td>
 <td><input type="password" name="txtPassword"
 maxlength="5" value="" /></td>
 </tr>
 <tr>
 <td colspan="2" id="centrado">
 <input type="submit" value="INGRESAR"
 name="btnIngresar" />
 </td>
 </tr>
 <tr>
 <td colspan="2" id="centrado">
 <?php
 if (isset($_POST['btnIngresar'])){
    require('validar.php');
 if (valida($usuario, $clave)=='ok')
 header('location:bienvenida.php');
 else{
 echo 'Error de datos..!!';
 }
 }
 ?>
 </td>
 </tr>
 </table>
 </form>
 </section>
 <footer>
 <?php require('pie.php'); ?>
 </footer>
</body>
</html>