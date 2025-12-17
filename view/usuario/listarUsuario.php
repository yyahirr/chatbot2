<?php
require_once("../../model/usuario.class.php");
$usuarios = Usuario::obtenerTodas();
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoListar.css">

<main role="main" aria-labelledby="titulo-lista-usuarios">
  <h1 id="titulo-lista-usuarios">Listado de usuarios</h1>
  <p id="desc-lista-usuarios" class="sr-only">Tabla con usuarios registrados.</p>

  <div class="list-actions">
    <a class="btn-primary" href="formAltaUsuario.php">Nuevo usuario</a>
  </div>

  <table class="list-table" role="table" aria-describedby="desc-lista-usuarios">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($usuarios && count($usuarios)): foreach ($usuarios as $u): ?>
      <tr>
        <td><?= htmlspecialchars($u['id']) ?></td>
        <td><?= htmlspecialchars($u['nombre']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td>
          <a class="link-action" href="formEditarUsuario.php?id=<?= urlencode($u['id']) ?>">Editar</a>
          <form class="inline-form" action="../../controller/usuario.controller.php" method="POST" onsubmit="return confirm('¿Seguro?')">
            <input type="hidden" name="operacion" value="eliminar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">
            <button class="btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="4">No hay usuarios</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>
