<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoForm.css">

<main role="main" aria-labelledby="titulo-form-usuario">
  <h1 id="titulo-form-usuario">Alta de usuario</h1>

  <form class="form-alta" role="form" action="../../controller/usuario.controller.php" method="POST" aria-describedby="desc-form-usuario" novalidate>
    <p id="desc-form-usuario" class="sr-only">Formulario para crear un nuevo usuario.</p>
    <input type="hidden" name="operacion" value="guardar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos del usuario</legend>

      <div class="form-row">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-input" required aria-required="true" />
      </div>

      <div class="form-row">
        <label for="email" class="form-label">Correo electrónico</label>
        <input id="email" name="email" type="email" class="form-input" required aria-required="true" />
      </div>

      <div class="form-row">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input id="contrasena" name="contrasena" type="password" class="form-input" required aria-required="true" />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>