<?php
require_once "../../model/categoria.class.php";

if (!isset($_GET['id'])) {
    echo "No se recibió un ID";
    exit;
}

$idParam = (int)$_GET['id'];
$categoriaObj = Categoria::obtenerPorId($idParam);

if (!$categoriaObj) {
    echo "La categoría no existe.";
    exit;
}

if (is_object($categoriaObj) && method_exists($categoriaObj, 'getId')) {
    $id = $categoriaObj->getId();
    $nombre = $categoriaObj->getNombre() ?? '';
} elseif (is_array($categoriaObj)) {
    $id = $categoriaObj['id'] ?? '';
    $nombre = $categoriaObj['nombre'] ?? '';
} else {
    $id = $nombre = '';
}
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoEditar.css">

<main role="main" aria-labelledby="titulo-editar-categoria">
  <h1 id="titulo-editar-categoria">Editar categoría</h1>

  <form class="form-editar" role="form" action="../../controller/categoria.controller.php" method="POST" aria-describedby="desc-editar-categoria" novalidate>
    <p id="desc-editar-categoria" class="sr-only">Formulario para editar una categoría.</p>
    <input type="hidden" name="operacion" value="actualizar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos de la categoría</legend>

      <div class="form-row">
        <label for="id" class="form-label">ID</label>
        <input id="id" name="id" type="text" class="form-input" value="<?= htmlspecialchars($id) ?>" readonly />
      </div>

      <div class="form-row">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-input" value="<?= htmlspecialchars($nombre) ?>" required />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
        <a href="listarCategoria.php">Volver</a>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>