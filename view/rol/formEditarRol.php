<?php
include "../../model/rol.class.php";
if (isset($_GET['id'])) {
    $rol = Rol::obtenerPorId($_GET['id']);
    if ($rol) {
?>

<h2>Editar Rol</h2>
<form name="formEditarRol" action="../../controller/rol.controller.php" method="POST">
    <input type="hidden" name="operacion" value="actualizar">
    <label> Id del Rol: </label>
    <input type="text" name="id" value="<?= htmlspecialchars($rol->getId()); ?>" readonly/>
    <label> Nombre del Rol: </label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($rol->getNombre()); ?>" required/>
    <input type="submit" value="Aceptar" />
</form>

<?php
    echo "<a href='listarRol.php'>Volver</a>";
    } else {
        print "El rol no existe.";
    }
} else {
    print "El ID ingresado no es valido";
}
?>