<?php
require_once("../../model/conversacion.class.php");
$conversaciones = Conversaciones::obtenerTodas();
?>

<h2>Listado de Conversaciones</h2>

<table border="1" cellpadding="5" cellspacing="0">
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
