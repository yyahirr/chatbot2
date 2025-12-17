<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoForm.css">

<main role="main" aria-labelledby="titulo-form-rol">
  <h1 id="titulo-form-rol">Alta de rol</h1>

  <form class="form-alta" role="form" action="../../controller/rol.controller.php" method="POST" aria-describedby="desc-form-rol" novalidate>
    <p id="desc-form-rol" class="sr-only">Formulario para crear un nuevo rol.</p>
    <input type="hidden" name="operacion" value="guardar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos del rol</legend>

      <div class="form-row">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-input" required aria-required="true" />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>