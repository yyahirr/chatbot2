<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
  </head>
  <body>
    <form action="/login" method="POST" autocomplete="on">
      <div>
        <input type="email" name="email" placeholder="Email" required/>
      </div>
      <div>
        <input type="password" name="contrasena" placeholder="Contraseña" required/>
      </div>
      <div>
        <button type="submit">Ingresar</button>
      </div>
    </form>
  </body>
</html>
