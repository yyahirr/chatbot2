<?php
include "../../model/usuario.class.php";

if (isset($_GET['id'])) {
    $usuario = Usuario::obtenerPorId($_GET['id']); 
    if ($usuario) {
?>

<h2>Editar Usuario</h2>
<form name="formEditarUsuario" action="../../controller/usuario.controller.php" method="POST">
    <input type="hidden" name="operacion" value="actualizar">
    <label>Id del Usuario:</label>
    <input type="text" name="id" value="<?= htmlspecialchars($usuario['id']) ?>" readonly /><br><br>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required /><br><br>
    <label>Correo electrónico:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required /><br><br>
    <label>Contraseña:</label>
    <input type="password" name="contrasena" value="<?= htmlspecialchars($usuario['password']) ?>" required /><br><br>
    <label>Rol:</label>
    <input type="number" name="rol_id" value="<?= htmlspecialchars($usuario['rol_id']) ?>" /><br><br>
    <input type="submit" value="Aceptar" />
</form>

<?php
    echo "<a href='listarUsuario.php'>Volver</a>";
    } else {
        print "El usuario no existe.";
    }
} else {
    print "El ID ingresado no es válido";
}
?>