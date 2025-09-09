<?php
include "../../model/pregunta.class.php";
if (isset($_GET['id'])) {
    $pregunta = Preguntas::obtenerPorId($_GET['id']);
?>

<h2>Editar Pregunta</h2>
<form name="formEditarPregunta" action="../../controller/pregunta.controller.php" method="POST">
    <input type="hidden" name="operacion" value="actualizar">
    <label>Id de la Pregunta:</label>
    <input type="text" name="id" value="<?= $pregunta['id']; ?>" readonly /><br><br>
    <label>Pregunta:</label>
    <input type="text" name="pregunta" value="<?= $pregunta['pregunta']; ?>" required /><br><br>
    <label>Categoría ID:</label>
    <input type="number" name="categoria_id" value="<?= $pregunta['categoria_id']; ?>" required /><br><br>
    <input type="submit" value="Aceptar" />
</form>

<?php
    echo "<a href='listarPregunta.php'>Volver</a>";
} else {
    print "El ID ingresado no es válido";
}
?>