<link rel="stylesheet" href="../../css/diseñoMenu.css">
<link rel="stylesheet" href="../../css/cssSU/diseñoForm.css">

<main role="main" aria-labelledby="titulo-form-respuesta">
  <h1 id="titulo-form-respuesta">Alta de respuesta</h1>

  <form class="form-alta" role="form" action="../../controller/respuesta.controller.php" method="POST" aria-describedby="desc-form-respuesta" novalidate>
    <p id="desc-form-respuesta" class="sr-only">Formulario para crear una nueva respuesta.</p>
    <input type="hidden" name="operacion" value="guardar">

    <fieldset class="form-fieldset">
      <legend class="sr-only">Datos de la respuesta</legend>

      <div class="form-row">
        <label for="respuesta" class="form-label">Respuesta</label>
        <input id="respuesta" name="respuesta" type="text" class="form-input" required aria-required="true" />
      </div>

      <div class="form-row">
        <label for="pregunta_id" class="form-label">ID de la pregunta</label>
        <input id="pregunta_id" name="pregunta_id" type="number" class="form-input" required aria-required="true" />
      </div>

      <div class="form-actions">
        <button type="submit" class="form-button">Guardar</button>
      </div>
    </fieldset>
  </form>
</main>

<footer role="contentinfo" aria-hidden="true"></footer>