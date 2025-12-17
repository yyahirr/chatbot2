<?php
require_once("../../model/categoria.class.php");
$categorias = Categoria::obtenerTodas();
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoListar.css">

<main role="main" aria-labelledby="titulo-lista-categorias">
  <h1 id="titulo-lista-categorias">Listado de categorías</h1>
  <p id="desc-lista-categorias" class="sr-only">Tabla con categorías registradas.</p>

  <div class="list-actions">
    <a class="btn-primary" href="formAltaCategoria.php">Nueva categoría</a>
  </div>

  <table class="list-table" role="table" aria-describedby="desc-lista-categorias">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($categorias && count($categorias)): foreach ($categorias as $cat): ?>
      <tr>
        <td><?= htmlspecialchars($cat['id']) ?></td>
        <td><?= htmlspecialchars($cat['nombre']) ?></td>
        <td>
          <a class="link-action" href="formEditarCategoria.php?id=<?= urlencode($cat['id']) ?>">Editar</a>
          <form class="inline-form" action="../../controller/categoria.controller.php" method="POST" onsubmit="return confirm('¿Seguro?')">
            <input type="hidden" name="operacion" value="eliminar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($cat['id']) ?>">
            <button class="btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="3">No hay categorías</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>