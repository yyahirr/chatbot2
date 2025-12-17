<?php
require_once("../../model/pregunta.class.php");
$preguntas = Preguntas::obtenerTodas();
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoListar.css">

<main role="main" aria-labelledby="titulo-lista-preguntas">
  <h1 id="titulo-lista-preguntas">Listado de preguntas</h1>
  <p id="desc-lista-preguntas" class="sr-only">Tabla con preguntas registradas.</p>

  <div class="list-actions">
    <a class="btn-primary" href="formAltaPregunta.php">Nueva pregunta</a>
  </div>

  <table class="list-table" role="table" aria-describedby="desc-lista-preguntas">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Pregunta</th>
        <th scope="col">Categoría ID</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($preguntas && count($preguntas)): foreach ($preguntas as $p): ?>
      <tr>
        <td><?= htmlspecialchars($p['id']) ?></td>
        <td><?= htmlspecialchars($p['pregunta']) ?></td>
        <td><?= htmlspecialchars($p['categoria_id']) ?></td>
        <td>
          <a class="link-action" href="formEditarPregunta.php?id=<?= urlencode($p['id']) ?>">Editar</a>
          <form class="inline-form" action="../../controller/pregunta.controller.php" method="POST" onsubmit="return confirm('¿Seguro?')">
            <input type="hidden" name="operacion" value="eliminar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($p['id']) ?>">
            <button class="btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="4">No hay preguntas</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>