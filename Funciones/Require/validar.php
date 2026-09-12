<?php
function valida($usuario,$clave){
 $acceso='';
 if ($usuario=='Administrador' && $clave=='1234A') $acceso='ok';
 if ($usuario=='Sistemas' && $clave=='1111A') $acceso='ok';
 if ($usuario=='Operador' && $clave=='2222A') $acceso='ok';
 return $acceso;
 }
?>