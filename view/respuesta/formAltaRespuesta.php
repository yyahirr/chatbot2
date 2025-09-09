<h1>Alta de Respuesta</h2>
<form action="../../controller/respuesta.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar">
    <label for="respuesta">Respuesta:</label>
    <input type="text" id="respuesta" name="respuesta" required><br><br>
    <label for="pregunta_id">Pregunta ID:</label>
    <input type="number" id="pregunta_id" name="pregunta_id" required><br><br>
    <button type="submit">Guardar Respuesta</button>
</form>