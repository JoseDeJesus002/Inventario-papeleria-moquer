<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylelogin.css">

    <title>login</title>
</head>
<body>
    <form action="validar_login.php" method="post">
        <h1>login</h1>
        <p>usuario <input type="text" name="usuario" placeholder="usuario"></p>
        <p>password <input type="password" name="password" placeholder="contraseña"></p>
        <p><input type="submit" value="Ingresar"></p>
    </form>
    <a href="registro_login.php">Registrarse</a>
</body>
</html>