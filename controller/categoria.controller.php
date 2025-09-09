<?php
include ("../model/categoria.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null; // captura la operación a realizar
$result = null; // inicializa la variable de resultado

if ($operacion == "guardar") {
    $categoria = new Categoria(null, $_POST['nombre']);
    $result = $categoria->guardar();
} elseif ($operacion == "actualizar") {
    $categoria = new Categoria($_POST['id'], $_POST['nombre']);
    $result = $categoria->actualizar();
} elseif ($operacion == "eliminar") {
    $categoria = new Categoria($_POST['id'], null);
    $result = $categoria->eliminar($_POST['id']);
}

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href='../view/categoria/listarCategoria.php'>Volver a la lista de categorías</a>";
?>