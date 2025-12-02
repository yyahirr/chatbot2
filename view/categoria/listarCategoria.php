<?php
require_once("../../model/categoria.class.php");
$categorias = Categoria::obtenerTodas();
?>

<a href="formAltaCategoria.php">Nueva categoría</a>

<?php if ($categorias && count($categorias)) : ?>
<table>
    <tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>
    <?php foreach ($categorias as $categoria) : ?>
    <tr>
        <td><?= $categoria['id'] ?></td>
        <td><?= htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
        <td>
            <a href="formEditarCategoria.php?id=<?= $categoria['id'] ?>">Editar</a>
            <form action="../../controller/categoria.controller.php" method="POST" style="display:inline;">
                <input type="hidden" name="operacion" value="eliminar">
                <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
                <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta categoría?')">Eliminar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>No hay categorías</p>
<?php endif; ?>