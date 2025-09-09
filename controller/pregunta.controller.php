<?php
include ('../model/pregunta.class.php');

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result = null;

if ($operacion == "guardar") {
    $pregunta = new Preguntas(null, $_POST['pregunta'], $_POST['categoria_id']);
    $result = $pregunta->guardar();
} elseif ($operacion == "actualizar") {
    $pregunta = new Preguntas($_POST['id'], $_POST['pregunta'], $_POST['categoria_id']);
    $result = $pregunta->actualizar();
} elseif ($operacion == "eliminar") {
    $pregunta = new Preguntas($_POST['id'], null, null);
    $result = $pregunta->eliminar($_POST['id']);
}

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href='../view/pregunta/listarPregunta.php'>Volver a la lista de preguntas</a>";

?>