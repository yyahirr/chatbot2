<?php
include ("../model/rol.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result=null;

if ($operacion == "guardar"){
    $rol = new Rol(null, $_POST['nombre']);
    $result=$rol->guardar();
}else if ($operacion == "actualizar"){
    $rol = new Rol($_POST['id'], $_POST['nombre']);
    $result=$rol->actualizar();
}else if ($operacion == "eliminar"){
    $rol = new Rol($_POST['id'], null);
    $result = $rol->eliminar($_POST['id']);
    }

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href= '../view/rol/listarRol.php'>Volver a la lista de roles</a>";

?>