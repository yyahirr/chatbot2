<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoForm.css">

<main role="main" aria-labelledby="titulo-form-categoria">
  <h1 id="titulo-form-categoria">Alta de categoría</h1>

  <form class="form-alta" role="form" action="../../controller/categoria.controller.php" method="POST" aria-describedby="desc-form-categoria" novalidate>
    <p id="desc-form-categoria" class="sr-only">Formulario para crear una nueva categoría.</p>
    <input type="hidden" name="operacion" value="guardar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos de la categoría</legend>

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