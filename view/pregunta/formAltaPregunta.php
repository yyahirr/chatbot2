<h2>Alta de Pregunta</h2>
<form action="../../controller/pregunta.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar">
    <label for="pregunta">Pregunta:</label>
    <input type="text" id="pregunta" name="pregunta" required><br><br>
    <label for="categoria_id">Categoría ID:</label>
    <input type="number" id="categoria_id" name="categoria_id" required><br><br>
    <button type="submit">Guardar Pregunta</button>
</form>