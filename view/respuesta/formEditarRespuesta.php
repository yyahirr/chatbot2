<?php
include "../../model/respuesta.class.php";
if (isset($_GET['id'])) {
    $respuesta = Respuesta::obtenerPorId($_GET['id']);
?>

<h2>Editar Respuesta</h2>
<form name="formEditarRespuesta" action="../../controller/respuesta.controller.php" method="POST">
    <input type="hidden" name="operacion" value="actualizar">
    <label>Id de la Respuesta:</label>
    <input type="text" name="id" value="<?= $respuesta[0]['id']; ?>" readonly/>
    <label>Texto de la Respuesta:</label>
    <input type="text" name="respuesta" value="<?= $respuesta[0]['respuesta']; ?>" required/>
    <label>ID de la Pregunta:</label>
    <input type="number" name="pregunta_id" value="<?= $respuesta[0]['pregunta_id']; ?>" required/>
    <input type="submit" value="Aceptar" />
</form>

<?php
        echo "<a href='listarRespuesta.php'>Volver</a>";
    } else {
        print "El ID ingresado no es válido";
    }
?>
