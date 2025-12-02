<?php
include ("../model/categoria.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null; // captura la operación a realizar
$result = null; // inicializa la variable de resultado

if ($operacion == "guardar") {
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $categoria = new Categoria(null, $nombre);
    $result = $categoria->guardar();
} elseif ($operacion == "actualizar") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $categoria = new Categoria($id, $nombre);
    $result = $categoria->actualizar();
} elseif ($operacion == "eliminar") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    if ($id && $id > 0) {
        $categoria = new Categoria($id, null);
        // ahora eliminar() no recibe parámetros, usa $this->id internamente
        $result = $categoria->eliminar();
    } else {
        $result = false;
    }
}

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href='../view/categoria/listarCategoria.php'>Volver a la lista de categorías</a>";
?>