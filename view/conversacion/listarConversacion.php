<?php
require_once("../../model/conversacion.class.php");
$conversaciones = Conversaciones::obtenerTodas();
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoListar.css">

<main role="main" aria-labelledby="titulo-lista-conversaciones">
  <h1 id="titulo-lista-conversaciones">Listado de conversaciones</h1>
  <p id="desc-lista-conversaciones" class="sr-only">Tabla con conversaciones del chatbot.</p>

  <div class="list-actions">
    <a class="btn-primary" href="../../index.php">Ir al chatbot</a>
  </div>

  <table class="list-table" role="table" aria-describedby="desc-lista-conversaciones">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Pregunta Usuario</th>
        <th scope="col">Respuesta Bot</th>
        <th scope="col">Fecha y Hora</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($conversaciones && count($conversaciones)): foreach ($conversaciones as $c): ?>
      <tr>
        <td><?= htmlspecialchars($c['id']) ?></td>
        <td><?= htmlspecialchars($c['pregunta_usuario']) ?></td>
        <td><?= htmlspecialchars($c['respuesta_bot']) ?></td>
        <td><?= htmlspecialchars($c['fecha_hora']) ?></td>
      </tr>
      <?php endforeach; else: ?>
      <tr><td colspan="4">No hay conversaciones</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>