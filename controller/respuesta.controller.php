<?php
include ("../model/respuesta.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result = null;

if ($operacion == "guardar") {
    $respuesta = new Respuesta(null, $_POST['respuesta'], $_POST['pregunta_id']);
    $result = $respuesta->guardar();
} else if ($operacion == "actualizar") {
    $respuesta = new Respuesta($_POST['id'], $_POST['respuesta'], $_POST['pregunta_id']);
    $result = $respuesta->actualizar();
} else if ($operacion == "eliminar") {
    $respuesta = new Respuesta($_POST['id'], null, null);
    $result = $respuesta->eliminar($_POST['id']);
}

include_once __DIR__ . '/response.helper.php';
$message = $result ? 'Operación realizada con éxito.' : 'Error al realizar la operación.';
renderResponsePage((bool)$result, $message, '../view/respuesta/listarRespuesta.php');
?>