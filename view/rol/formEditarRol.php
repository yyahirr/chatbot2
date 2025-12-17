<?php
require_once "../../model/rol.class.php";

if (!isset($_GET['id'])) {
    echo "No se recibió un ID";
    exit;
}

$idParam = (int)$_GET['id'];
$rolObj = Rol::obtenerPorId($idParam);

if (!$rolObj) {
    echo "El rol no existe.";
    exit;
}

if (is_object($rolObj) && method_exists($rolObj, 'getId')) {
    $id = $rolObj->getId();
    $nombre = $rolObj->getNombre() ?? '';
} elseif (is_array($rolObj)) {
    $id = $rolObj['id'] ?? '';
    $nombre = $rolObj['nombre'] ?? '';
} else {
    $id = $nombre = '';
}
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoEditar.css">

<main role="main" aria-labelledby="titulo-editar-rol">
  <h1 id="titulo-editar-rol">Editar rol</h1>

  <form class="form-editar" role="form" action="../../controller/rol.controller.php" method="POST" aria-describedby="desc-editar-rol" novalidate>
    <p id="desc-editar-rol" class="sr-only">Formulario para editar un rol.</p>
    <input type="hidden" name="operacion" value="actualizar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos del rol</legend>

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
        <a href="listarRol.php">Volver</a>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>