<?php
    require 'conexion.php';
   
    require 'conexion.php';
    session_start();

    $nombre = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribirse</title>
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

    <div class="container w-50 mt-5">

        <h1 class="mb-4 text-primary"> Inscribirse a proxima clase</h1>
        <h3 class="mb-4 text-primary">Bienvenida, <?= htmlspecialchars($nombre) ?>!</h3>

        <form method= "post" class= "card p-4 shadow-sm bg-white rounded">
           
           <div class= "mb-3">
               <label class="form-label"> Clase: </label><br>
               <input type = "text" name = "clase" class="form-control" required><br><br>
           </div>

           <div class= "mb-3">
               <label class="form-label"> Cedula: </label><br>
               <input type = "text" name = "cedula" class="form-control" required><br><br>
           </div>

            <button type="submit" class="btn btn-primary w-100">
                 <i class="bi bi-save me-2"></i> Guardar reserva
            </button><br><br>

             <a href="login.php" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
              </a>

        </form>
    </div>      
</body>        
</html>

<?php 
    require 'conexion.php';
    
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {

        $clase = $_POST['clase'];
        $cedula = $_POST['cedula'];
        $consulta = $conexion -> prepare ("INSERT INTO inscripcion (clase, cedula) VALUES (?, ?)");
        
        $consulta -> bind_param("ss", $clase, $cedula);


        if ($consulta -> execute()) {

            echo "<div class='alert alert-success mt-3'>Usuario inscrito correctamente.</div>";
            echo "<meta http-equiv='refresh' content='2;URL=listar_inscrip.php'>";
            //Si se insertó, redirigimos al usuario ala pagina de listar
            
        } else {
            //Si hubo un error, lo mostramos
            echo "<div class='alert alert-danger'>Error al incribirse: " . $consulta -> error; "</div>";
        }


        $consulta -> close();
        $conexion -> close();
    }
?>

