<?php
require_once("../../model/conversacion.class.php");
$conversaciones = Conversaciones::obtenerTodas();
?>

<h2 style="text-align: center;">Listado de Conversaciones</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="../../index.php">IR AL CHATBOT</a>
</div>
<table border="1" style="width: 100%; border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Pregunta Usuario</th>
    <th>Respuesta Bot</th>
    <th>Fecha y Hora</th>
</tr>
<?php foreach ($conversaciones as $conversacion) { ?>
<tr>
    <td><?= htmlspecialchars($conversacion['id']) ?></td>
    <td><?= htmlspecialchars($conversacion['pregunta_usuario']) ?></td>
    <td><?= htmlspecialchars($conversacion['respuesta_bot']) ?></td>
    <td><?= htmlspecialchars($conversacion['fecha_hora']) ?></td>
</tr>
<?php } ?>
</table>
