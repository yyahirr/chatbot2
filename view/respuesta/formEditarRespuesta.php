<?php
require_once "../../model/respuesta.class.php";

if (!isset($_GET['id'])) {
    echo "No se recibió un ID";
    exit;
}

$idParam = (int)$_GET['id'];
$respuestaObj = Respuesta::obtenerPorId($idParam);

if (!$respuestaObj) {
    echo "La respuesta no existe.";
    exit;
}

if ($respuestaObj instanceof Respuesta) {
    $id = $respuestaObj->getId();
    $texto = $respuestaObj->getRespuesta() ?? '';
    $preguntaId = $respuestaObj->getPreguntaId();
} elseif (is_array($respuestaObj)) {
    $id = $respuestaObj['id'] ?? '';
    $texto = $respuestaObj['respuesta'] ?? '';
    $preguntaId = $respuestaObj['pregunta_id'] ?? '';
} else {
    $id = $texto = $preguntaId = '';
}
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoEditar.css">

<main role="main" aria-labelledby="titulo-editar-respuesta">
  <h1 id="titulo-editar-respuesta">Editar respuesta</h1>

  <form class="form-editar" role="form" action="../../controller/respuesta.controller.php" method="POST" aria-describedby="desc-editar-respuesta" novalidate>
    <p id="desc-editar-respuesta" class="sr-only">Formulario para editar una respuesta.</p>
    <input type="hidden" name="operacion" value="actualizar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos de la respuesta</legend>

      <div class="form-row">
        <label for="id" class="form-label">ID</label>
        <input id="id" name="id" type="text" class="form-input" value="<?= htmlspecialchars($id) ?>" readonly />
      </div>

      <div class="form-row">
        <label for="respuesta" class="form-label">Respuesta</label>
        <input id="respuesta" name="respuesta" type="text" class="form-input" value="<?= htmlspecialchars($texto) ?>" required />
      </div>

      <div class="form-row">
        <label for="pregunta_id" class="form-label">Pregunta (ID)</label>
        <input id="pregunta_id" name="pregunta_id" type="number" class="form-input" value="<?= htmlspecialchars($preguntaId) ?>" required />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
        <a href="listarRespuesta.php">Volver</a>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>