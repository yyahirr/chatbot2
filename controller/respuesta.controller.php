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

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href='../view/respuesta/listarRespuesta.php'>Volver a la lista de respuestas</a>";

?>
