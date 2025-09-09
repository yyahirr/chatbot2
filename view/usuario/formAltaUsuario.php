    <h2>Alta de Usuario</h2>
    <form action="../../controller/usuario.controller.php" method="POST">
        <input type="hidden" name="operacion" value="guardar">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <!-- Si quieres permitir elegir el rol, descomenta lo siguiente:
        <label for="rol_id">Rol:</label>
        <input type="number" id="rol_id" name="rol_id"><br><br>
        -->

        <button type="submit">Guardar Usuario</button>
    </form>