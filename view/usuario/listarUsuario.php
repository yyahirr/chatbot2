<?php
require_once("../../model/usuario.class.php");
$usuarios = Usuario::obtenerTodas();
?>

<h2 style="text-align: center;">Listado de Usuarios</h2>
<div style="text-align: center; margin-bottom: 10px;">
<a href="formAltaUsuario.php">+ Nuevo Usuario</a>
</div>
<table border="1" style="margin: 0 auto;">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Acciones</th>
</tr>
<?php if ($usuarios) { foreach ($usuarios as $usuario){ ?>
<tr>
<td><?= $usuario['id'] ?></td>
<td><?= $usuario['nombre'] ?></td>
<td><?= $usuario['email'] ?></td>
<td>
    <!-- Botón de Editar -->
    <a href="formEditarUsuario.php?id=<?= $usuario['id'] ?>">Editar</a>

    <!-- Botón de Eliminar con formulario POST -->
    <form action="../../controller/usuario.controller.php" method="POST" style="display:inline;">
        <input type="hidden" name="operacion" value="eliminar">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este usuario?')">Eliminar</button>
    </form>
</td>
</tr>
<?php }} ?>
</table>