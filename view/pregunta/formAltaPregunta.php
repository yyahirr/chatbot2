<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoForm.css">

<main role="main" aria-labelledby="titulo-form-pregunta">
  <h1 id="titulo-form-pregunta">Alta de pregunta</h1>

  <form class="form-alta" role="form" action="../../controller/pregunta.controller.php" method="POST" aria-describedby="desc-form-pregunta" novalidate>
    <p id="desc-form-pregunta" class="sr-only">Formulario para crear una nueva pregunta.</p>
    <input type="hidden" name="operacion" value="guardar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos de la pregunta</legend>

      <div class="form-row">
        <label for="pregunta" class="form-label">Pregunta</label>
        <input id="pregunta" name="pregunta" type="text" class="form-input" required aria-required="true" />
      </div>

      <div class="form-row">
        <label for="categoria_id" class="form-label">ID de categoría</label>
        <input id="categoria_id" name="categoria_id" type="number" class="form-input" required aria-required="true" />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>