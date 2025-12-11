<?php
include ('../model/pregunta.class.php');
$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result = false;

if ($operacion == "guardar") {
    $preguntaTexto = isset($_POST['pregunta']) ? $_POST['pregunta'] : '';
    $categoria = !empty($_POST['categoria_id']) ? new Categoria((int)$_POST['categoria_id']) : null;
    $pregunta = new Preguntas(null, $preguntaTexto, $categoria);
    $result = $pregunta->guardar();
} elseif ($operacion == "actualizar") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $preguntaTexto = isset($_POST['pregunta']) ? $_POST['pregunta'] : '';
    $categoria = !empty($_POST['categoria_id']) ? new Categoria((int)$_POST['categoria_id']) : null;
    $pregunta = new Preguntas($id, $preguntaTexto, $categoria);
    $result = $pregunta->actualizar();
} elseif ($operacion == "eliminar") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $pregunta = new Preguntas($id, '', null);
    $result = $pregunta->eliminar();
}

include_once __DIR__ . '/response.helper.php';
$message = $result ? 'Operación realizada con éxito.' : 'Error al realizar la operación.';
renderResponsePage((bool)$result, $message, '../view/pregunta/listarPregunta.php');
?>