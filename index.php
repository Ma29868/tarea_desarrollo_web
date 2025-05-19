<?php
    require 'conexion.php';
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

   <style>
        body {
            background: linear-gradient(135deg,rgb(200, 238, 243), #ffffff);
            min-height: 100vh;
        }
        
    </style>


</head>

<body class= "bg-light">   

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4 w-100" style="max-width: 400px;">
        <h3 class="text-center text-primary mb-4">
            <i class="bi bi-person-check-fill me-2"></i> Reservar clase 
        </h3>

    <?php

        session_start(); //Inicio

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $nombre = trim($_POST["nombre"]);
              $clave = $_POST["clave"];
            
               // Buscar el nombre por nombre
               $sql = "SELECT nombre, clave FROM usuarios WHERE nombre = ?";
               $stmt = $conexion->prepare($sql);
               $stmt->bind_param("s", $nombre); // (s) indica que la variable es "String"
               $stmt->execute();
               $resultado = $stmt->get_result();
            
               if ($stmt->rowCount() === 1) {
                   $usuario = $resultado->fetch_assoc();
            

                   // Validar datos
                if (password_verify($clave, $usuario['clave'])) {
                   // Guardar datos de sesión
                   $_SESSION["usuario"] = $usuario['nombre'];

                   echo '<div class="alert alert-success text-center">
                         Bienvenida  <strong>'.htmlspecialchars($_SESSION['usuario']) . '</strong><br>
                         Sesión iniciada con exito.
                         </div>'; 

                   header("Location: crear_usuario.php");
                   exit;

                } else {
                    echo '<div class="alert alert-danger text-center">
                         Error en inicio de sesión. Por favor vulve a intentarlo mas tarde o verifica tus datos ingresados.
                    </div>';
                }
            }
        }    
    ?>

    <div class="alert alert-success text-center">
            Bienvenida. Gracias por preferirnos
             <strong><?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : $usuario  ?></strong>
    </div>

    <div class="d-grid mt-3">
            <a href="bienvenida.php" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right me-2"></i> COMENZAR
            </a>
    </div>
  
</body>
</html>