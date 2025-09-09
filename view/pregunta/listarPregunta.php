<?php
require_once("../../model/pregunta.class.php");
$preguntas = Preguntas::obtenerTodas();
?>

<h2 style="text-align: center;">Listado de Preguntas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaPregunta.php">+ Nueva Pregunta</a>
</div>
<table>
<tr>
    <th>ID</th>
    <th>Pregunta</th>
    <th>Categoría ID</th>
    <th>Acciones</th>
</tr>
<?php foreach ($preguntas as $pregunta) { ?>
<tr>
    <td><?= $pregunta['id'] ?></td>
    <td><?= $pregunta['pregunta'] ?></td>
    <td><?= $pregunta['categoria_id'] ?></td>
    <td>

        <a href="formEditarPregunta.php?id=<?= $pregunta['id'] ?>">Editar</a>

        <form action="../../controller/pregunta.controller.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $pregunta['id'] ?>">
            <input type="hidden" name="operacion" value="eliminar">
            <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta pregunta?')">Eliminar</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>