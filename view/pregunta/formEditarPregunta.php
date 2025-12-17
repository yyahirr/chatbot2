<?php
require_once "../../model/pregunta.class.php";

if (!isset($_GET['id'])) {
    echo "No se recibió un ID";
    exit;
}

$idParam = (int)$_GET['id'];
$preguntaObj = Preguntas::obtenerPorId($idParam);

if (!$preguntaObj) {
    echo "La pregunta no existe.";
    exit;
}

if ($preguntaObj instanceof Preguntas) {
    $id = $preguntaObj->getId();
    $texto = $preguntaObj->getPregunta() ?? '';
    $categoriaObj = $preguntaObj->getCategoria();
    $categoriaId = $categoriaObj ? $categoriaObj->getId() : '';
} elseif (is_array($preguntaObj)) {
    $id = $preguntaObj['id'] ?? '';
    $texto = $preguntaObj['pregunta'] ?? '';
    $categoriaId = $preguntaObj['categoria_id'] ?? '';
} else {
    $id = $texto = $categoriaId = '';
}
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoEditar.css">

<main role="main" aria-labelledby="titulo-editar-pregunta">
  <h1 id="titulo-editar-pregunta">Editar pregunta</h1>

  <form class="form-editar" role="form" action="../../controller/pregunta.controller.php" method="POST" aria-describedby="desc-editar-pregunta" novalidate>
    <p id="desc-editar-pregunta" class="sr-only">Formulario para editar una pregunta.</p>
    <input type="hidden" name="operacion" value="actualizar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos de la pregunta</legend>

      <div class="form-row">
        <label for="id" class="form-label">ID</label>
        <input id="id" name="id" type="text" class="form-input" value="<?= htmlspecialchars($id) ?>" readonly />
      </div>

      <div class="form-row">
        <label for="pregunta" class="form-label">Pregunta</label>
        <input id="pregunta" name="pregunta" type="text" class="form-input" value="<?= htmlspecialchars($texto) ?>" required />
      </div>

      <div class="form-row">
        <label for="categoria_id" class="form-label">Categoría (ID)</label>
        <input id="categoria_id" name="categoria_id" type="number" class="form-input" value="<?= htmlspecialchars($categoriaId) ?>" />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
        <a href="listarPregunta.php">Volver</a>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>