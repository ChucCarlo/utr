<?php
require 'conexion.php'; // Archivo de conexión a la BD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    // Validar que las contraseñas coincidan
    if ($password !== $password_confirm) {
        header("Location: registro.html?mensaje=Las contraseñas no coinciden.");
        exit();
    }

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Verificar si el correo ya está registrado
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: registro.html?mensaje=Este correo ya está registrado.");
        exit();
    }
    $stmt->close();

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $hashed_password);
    
    if ($stmt->execute()) {
        header("Location: login.php?mensaje=Registro exitoso. Ahora puedes iniciar sesión.");
    } else {
        header("Location: registro.html?mensaje=Error en el registro. Intenta de nuevo.");
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Registro</h2>
        <div class="text-center">
            <img src="images.png" alt="Logo" class="img-fluid mb-3" style="max-width: 100px;">
        </div>

        <!-- Mostrar mensajes de error o éxito -->
        <?php if (isset($_GET['mensaje'])): ?>
            <div class="alert alert-info text-center">
                <?php echo htmlspecialchars($_GET['mensaje']); ?>
            </div>
        <?php endif; ?>

        <form action="registro.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirm" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Registrarse</button>
        </form>
    </div>
</body>
</html>
