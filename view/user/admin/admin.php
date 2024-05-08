<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    <h1>Admin</h1>
    <a href="?b=admin&s=sessionexit" onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?')">Cerrar sesión</a>
    <p> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>  </p>
    <a href="?b=index">index</a>
</body>
</html> 
