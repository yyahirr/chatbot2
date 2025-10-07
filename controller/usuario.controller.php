<?php
include ("../model/usuario.class.php");

session_start();

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;

$result = null;

if ($operacion == "guardar") {
    $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $_POST['contrasena']);
    $result = $usuario->guardar();
} else if ($operacion == "actualizar") {
    $usuario = new Usuario($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['contrasena']);
    $result = $usuario->actualizar();
} else if ($operacion == "eliminar") {
    $usuario = new Usuario($_POST['id'], null, null, null);
    $result = $usuario->eliminar($_POST['id']);
}

if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}


//
print "<a href='../view/usuario/listarUsuario.php'>Volver a la lista de usuarios</a>";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['operacion'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['contrasena'] ?? '';

    $usuario = Usuario::verificarLogin($email, $password);

    if ($usuario) {
        $_SESSION['admin'] = $usuario->getId();
        header('Location: ../admin.php');
        exit;
    } else {
        header('Location: ../view/sesion/formularioLogin.php?error=1');
        exit;
    }
}
?>