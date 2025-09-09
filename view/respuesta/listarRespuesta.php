<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("../../model/respuesta.class.php");
$respuestas = Respuesta::obtenerTodas();
?>

<h2 style="text-align: center;">Listado de Respuestas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaRespuesta.php">+ Nueva Respuesta</a>
</div>
<table>
<tr>
    <th>ID</th>
    <th>Respuesta</th>
    <th>ID Pregunta</th>
    <th>Acciones</th>
</tr>
<?php foreach ($respuestas as $respuesta) { ?>
<tr>
    <td><?= $respuesta['id'] ?></td>
    <td><?= $respuesta['respuesta'] ?></td>
    <td><?= $respuesta['pregunta_id'] ?></td>
    <td>
        <!-- Botón de Editar -->
        <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>">Editar</a>

        <!-- Botón de Eliminar con formulario POST -->
        <form action="../../controller/respuesta.controller.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
            <input type="hidden" name="operacion" value="eliminar">
            <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta respuesta?')">Eliminar</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>

