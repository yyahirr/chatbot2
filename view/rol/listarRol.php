<?php
require_once("../../model/rol.class.php");
$roles = Rol::obtenerTodas();
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoListar.css">

<main role="main" aria-labelledby="titulo-lista-roles">
  <h1 id="titulo-lista-roles">Listado de roles</h1>
  <p id="desc-lista-roles" class="sr-only">Tabla con roles registrados.</p>

  <div class="list-actions">
    <a class="btn-primary" href="formAltaRol.php">Nuevo rol</a>
  </div>

  <table class="list-table" role="table" aria-describedby="desc-lista-roles">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($roles && count($roles)): foreach ($roles as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['id']) ?></td>
        <td><?= htmlspecialchars($r['nombre']) ?></td>
        <td>
          <a class="link-action" href="formEditarRol.php?id=<?= urlencode($r['id']) ?>">Editar</a>
          <form class="inline-form" action="../../controller/rol.controller.php" method="POST" onsubmit="return confirm('¿Seguro?')">
            <input type="hidden" name="operacion" value="eliminar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
            <button class="btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="3">No hay roles</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>