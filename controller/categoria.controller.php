<?php
include ("../model/categoria.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result = null;

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
        $result = $categoria->eliminar();
    } else {
        $result = false;
    }
}

include_once __DIR__ . '/response.helper.php';
$message = $result ? 'Operación realizada con éxito.' : 'Error al realizar la operación.';
renderResponsePage((bool)$result, $message, '../view/categoria/listarCategoria.php');
?>