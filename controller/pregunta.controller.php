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

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href='../view/pregunta/listarPregunta.php'>Volver a la lista de preguntas</a>";

?>