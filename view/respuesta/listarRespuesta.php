<?php
require_once("../../model/respuesta.class.php");
$respuestas = Respuesta::obtenerTodas();
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoListar.css">

<main role="main" aria-labelledby="titulo-lista-respuestas">
  <h1 id="titulo-lista-respuestas">Listado de respuestas</h1>
  <p id="desc-lista-respuestas" class="sr-only">Tabla con respuestas registradas.</p>

  <div class="list-actions">
    <a class="btn-primary" href="formAltaRespuesta.php">Nueva respuesta</a>
  </div>

  <table class="list-table" role="table" aria-describedby="desc-lista-respuestas">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Respuesta</th>
        <th scope="col">ID Pregunta</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($respuestas && count($respuestas)): foreach ($respuestas as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['id']) ?></td>
        <td><?= htmlspecialchars($r['respuesta']) ?></td>
        <td><?= htmlspecialchars($r['pregunta_id']) ?></td>
        <td>
          <a class="link-action" href="formEditarRespuesta.php?id=<?= urlencode($r['id']) ?>">Editar</a>
          <form class="inline-form" action="../../controller/respuesta.controller.php" method="POST" onsubmit="return confirm('¿Seguro?')">
            <input type="hidden" name="operacion" value="eliminar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
            <button class="btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="4">No hay respuestas</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>