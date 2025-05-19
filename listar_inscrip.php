<?php
    require 'conexion.php';
      session_start();

     if (!isset($_SESSION['nombre'])) {

    }

      $nombre = $_SESSION['nombre'];
      header("Location: login.php"); 
    exit;
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Inscripciones</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <style>
        body {
            background: linear-gradient(135deg,rgb(200, 238, 243), #ffffff);
            min-height: 100vh;
        }
        
    </style>
   
    </head>

    <body class= "bg-light">

        <div class="container w-50 mt-5">

            <h1 class="mb-4 text-primary"> Registrar Nuevo Usuario</h1>
            <h3 class="mb-4 text-black">Bienvenido, <?php echo htmlspecialchars($nombre); ?>!</h3>


             <?php
             $SQL = " 
                  SELECT u.nombre, u.cedula, i.clase, i.fecha_inscripcion 
                  FROM  usuarios u
                  JOIN inscripcion i ON u.cedula = i.cedula
             ";
           
               $resultado = $conexion -> query($SQL);

         if ($resultado && $resultado->num_rows > 0): ?>
        <table class="table table-bordered table-striped shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Cedula</th>
                    <th>Clase</th>
                    <th>Fecha inscripción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['cedula']) ?></td>
                        <td><?= htmlspecialchars($fila['clase']) ?></td>
                        <td><?= htmlspecialchars($fila['fecha_inscripcion']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No hay usuarios registrados.</div>
    <?php endif; ?>

        </div>   
        
        <a href="cerrar_sesion.php" class="btn btn-danger w-100">
               <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
        </a>



    </body>
    </html>