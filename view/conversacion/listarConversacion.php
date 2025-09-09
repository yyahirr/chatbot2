<?php
require_once("../../model/conversacion.class.php");
$conversaciones = Conversaciones::obtenerTodas();
?>

<h2 style="text-align: center;">Listado de Conversaciones</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="../../index.html">IR AL CHATBOT</a>
</div>
<table border="1" style="width: 100%; border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Pregunta Usuario</th>
    <th>Respuesta Bot</th>
    <th>Fecha y Hora</th>
    <th>Acciones</th>
</tr>
<?php foreach ($conversaciones as $conversacion) { ?>
<tr>
    <td><?= htmlspecialchars($conversacion['id']) ?></td>
    <td><?= htmlspecialchars($conversacion['pregunta_usuario']) ?></td>
    <td><?= htmlspecialchars($conversacion['respuesta_bot']) ?></td>
    <td><?= htmlspecialchars($conversacion['fecha_hora']) ?></td>
    <td>

        <a href="formEditarConversacion.php?id=<?= $conversacion['id'] ?>">Editar</a>

        <form action="../../controller/conversacion.controller.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $conversacion['id'] ?>">
            <input type="hidden" name="operacion" value="eliminar">
            <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta conversación?')">Eliminar</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>
