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

print "<a href='../formularios/listarUsuario.php'>Volver a la lista de usuarios</a>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['contrasena']) ? trim($_POST['contrasena']) : null;

    if ($email && $password) {
        // Llamamos al método de la clase Usuario
        $usuario = Usuario::verificarLogin($email, $password);

        if ($usuario) {
            // Guardamos datos en sesión
            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nombre'] = $usuario->getNombre();
            $_SESSION['usuario_email'] = $usuario->getEmail();
            $_SESSION['usuario_rol'] = $usuario->getRol() ? $usuario->getRol()->getId() : null;

            // Redirigir al panel o página principal
            header("Location: ../view/sesion/formularioLogin.php");
            exit;
        } else {
            $error = "Email o contraseña incorrectos.";
        }
    } else {
        $error = "Debes completar todos los campos.";
    }
}
?>
