<?php
include_once("../model/conversacion.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result = null;

if ($operacion == "guardar") {
    $preguntaUsuario = isset($_POST['pregunta_usuario']) ? $_POST['pregunta_usuario'] : null;
    $respuestaBot = isset($_POST['respuesta_bot']) ? $_POST['respuesta_bot'] : null;
    $fechaHora = date('Y-m-d H:i:s');

    $conversacion = new Conversaciones(null, $preguntaUsuario, $respuestaBot, $fechaHora);
    $result = $conversacion->guardar();

if ($result) {
    echo "<br>Operación realizada con éxito.<br>";
} else {
    echo "<br>Error al realizar la operación.<br>";
}


echo "<a href='../view/conversacion/listarConversacion.php'>Volver a la lista de conversaciones</a>";
?>
