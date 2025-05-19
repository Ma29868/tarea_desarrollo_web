<?php
    require 'conexion.php';
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Usuarios Registrados</title>
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

             <?php
             $SQL = " 
                  SELECT u.nombre, u.cedula, u.contraseña, i.edad, u.correo, i.fecha_inscripcion 
                  FROM  usuarios u
                  JOIN usuarios i ON u.id = i.id
             ";
           
               $resultado = $conexion -> query($SQL);

         if ($resultado && $resultado->num_rows > 0): ?>
        <table class="table table-bordered table-striped shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Contraseña</th>
                    <th>Edad</th>
                    <th>Correo</th>
                    <th>Fecha inscripción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['nombre']) ?></td>
                        <td><?= htmlspecialchars($fila['cedula']) ?></td>
                        <td><?= htmlspecialchars($fila['contraseña']) ?></td>
                        <td><?= htmlspecialchars($fila['edad']) ?></td>
                        <td><?= htmlspecialchars($fila['correo']) ?></td>
                        <td><?= htmlspecialchars($fila['fecha_inscripcion']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No hay usuarios registrados.</div>
    <?php endif; ?>

        </div>   
        
    </body>
    </html>
   