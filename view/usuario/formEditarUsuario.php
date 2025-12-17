<?php
require_once "../../model/usuario.class.php";

if (!isset($_GET['id'])) {
    echo "No se recibió un ID";
    exit;
}

$idParam = (int)$_GET['id'];
$usuarioObj = Usuario::obtenerPorId($idParam);

if (!$usuarioObj) {
    echo "El usuario no existe.";
    exit;
}

if (is_object($usuarioObj) && method_exists($usuarioObj, 'getId')) {
    $id = $usuarioObj->getId();
    $nombre = $usuarioObj->getNombre() ?? '';
    $email = $usuarioObj->getEmail() ?? '';
    $password = $usuarioObj->getPassword() ?? '';
    $rolObj = $usuarioObj->getRol();
    $rolId = ($rolObj && method_exists($rolObj, 'getId')) ? $rolObj->getId() : ($rolObj ?? '');
} elseif (is_array($usuarioObj)) {
    $id = $usuarioObj['id'] ?? '';
    $nombre = $usuarioObj['nombre'] ?? '';
    $email = $usuarioObj['email'] ?? '';
    $password = $usuarioObj['password'] ?? '';
    $rolId = $usuarioObj['rol_id'] ?? '';
} else {
    $id = $nombre = $email = $password = $rolId = '';
}
?>
<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoEditar.css">

<main role="main" aria-labelledby="titulo-editar-usuario">
  <h1 id="titulo-editar-usuario">Editar usuario</h1>

  <form class="form-editar" role="form" action="../../controller/usuario.controller.php" method="POST" aria-describedby="desc-editar-usuario" novalidate>
    <p id="desc-editar-usuario" class="sr-only">Formulario para editar un usuario.</p>
    <input type="hidden" name="operacion" value="actualizar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos del usuario</legend>

      <div class="form-row">
        <label for="id" class="form-label">ID</label>
        <input id="id" name="id" type="text" class="form-input" value="<?= htmlspecialchars($id) ?>" readonly />
      </div>

      <div class="form-row">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-input" value="<?= htmlspecialchars($nombre) ?>" required />
      </div>

      <div class="form-row">
        <label for="email" class="form-label">Correo electrónico</label>
        <input id="email" name="email" type="email" class="form-input" value="<?= htmlspecialchars($email) ?>" required />
      </div>

      <div class="form-row">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input id="contrasena" name="contrasena" type="password" class="form-input" value="<?= htmlspecialchars($password) ?>" />
      </div>

      <div class="form-row">
        <label for="rol_id" class="form-label">Rol (ID)</label>
        <input id="rol_id" name="rol_id" type="number" class="form-input" value="<?= htmlspecialchars($rolId) ?>" />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
        <a href="listarUsuario.php">Volver</a>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>