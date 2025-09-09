<?php
include "../../model/categoria.class.php";
if (isset($_GET['id'])) {
    $categoria = Categoria::obtenerPorId($_GET['id']);
    if ($categoria) {
?>

<h2>Editar Categoría</h2>
<form name="formEditarCategoria" action="../../controller/categoria.controller.php" method="POST">
    <input type="hidden" name="operacion" value="actualizar">
    <label>Id de la Categoría:</label>
    <input type="text" name="id" value="<?= $categoria['id']; ?>" readonly/>
    <label>Nombre de la Categoría:</label>
    <input type="text" name="nombre" value="<?= $categoria['nombre']; ?>" required/>
    <input type="submit" value="Aceptar" />
</form>

<?php
        echo "<a href='listarCategoria.php'>Volver</a>";
    } else {
        print "El ID ingresado no es válido";
    }
} else {
    print "No se recibió un ID";
}
?>