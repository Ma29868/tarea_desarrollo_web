<?php
session_start();
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, rgb(200, 238, 243), #ffffff);
            min-height: 100vh;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="container text-center mt-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
            <h2>Iniciar sesión</h2>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = trim($_POST["nombre"]);
                $contraseña = $_POST["contraseña"] ?? '';

                $sql = "SELECT nombre, contraseña FROM usuarios WHERE nombre = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("s", $nombre);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows === 1) {
                    $usuario = $resultado->fetch_assoc();

                    if (password_verify($contraseña, $usuario['contraseña'])) {
                        $_SESSION["usuario"] = $usuario['nombre'];
                        echo '<div class="alert alert-success text-center">
                                Bienvenida <strong>' . htmlspecialchars($_SESSION['usuario']) . '</strong><br>
                                Sesión iniciada con éxito.
                              </div>';
                        echo '<script>setTimeout(function(){ window.location.href = "crear_usuario.php"; }, 2000);</script>';

                    } else {
                        echo '<div class="alert alert-danger text-center">
                            Usuario no encontrado. Por favor has click en "Registrarse"
                        </div>';
                    }      
                } else {
                    echo '<div class="alert alert-danger text-center">
                            Usuario no encontrado. Por favor has click en "Registrarse"
                          </div>';
            }
        }    

            ?>

            <form method="POST">
                <div class="mb-3 text-start">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" name="contraseña" class="form-control" required>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-2"></i> INICIAR SESIÓN
                    </button>
                </div>
            </form>

            <div class="d-grid mt-3">
                <a href="crear_usuario.php" class="btn btn-secondary">
                    <i class="bi bi-person-plus-fill me-2"></i> REGISTRARSE
                </a>
            </div>

        </div>
    </div>
</body>
</html>