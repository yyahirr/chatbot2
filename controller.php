<?php
include_once 'model/database.class.php';
include_once 'model/conversacion.class.php'; // Incluís la clase para guardar

if (isset($_POST['text'])) {
    $preguntaUsuario = trim($_POST['text']);
    $conexion = Database::getConnection();

    $sql = "SELECT r.respuesta 
            FROM preguntas p 
            JOIN respuesta r ON p.id = r.pregunta_id 
            WHERE LOWER(p.pregunta) = LOWER(?) 
            LIMIT 1";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$preguntaUsuario]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $respuestaBot = "No puedo responder a esa pregunta.";
    if ($row && !empty($row['respuesta'])) {
        $respuestaBot = $row['respuesta'];
    }

    // Guardar conversación en la base de datos
    $fechaHora = date('Y-m-d H:i:s');
    $conversacion = new Conversaciones(null, $preguntaUsuario, $respuestaBot, $fechaHora);
    $conversacion->guardar();

    // Devolver respuesta al frontend
    echo $respuestaBot;
}
?>
