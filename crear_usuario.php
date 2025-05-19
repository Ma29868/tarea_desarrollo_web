<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
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
        <div class="card shadow p-4 mx-auto" style="max-width: 500px;">

        <h1 class="mb-4 text-center text-primary"> Registrar Nuevo Usuario</h1>
        <h3 class="mb-4 text-center text-dark fw-semibold"> Por favor ingrese sus datos</h3>
        <form method= "post" class= "card p-4 shadow-sm bg-white rounded">
           
           <div class= "mb-3">
               <label class="form-label"> Nombre: </label><br>
               <input type = "text" name = "nombre" class="form-control" required><br><br>
           </div>

            <div class= "mb-3">
               <label class="form-label"> Cedula: </label><br>
               <input type = "text" name = "cedula" class="form-control" required><br><br>
           </div>    
           
           <div class= "mb-3">
               <label class="form-label"> Contraseña: </label><br>
               <input type = "password" name = "contraseña" class="form-control" required><br><br>
           </div>

           <div class= "mb-3">
               <label class="form-label"> Edad: </label><br>
               <input type = "number" name = "edad" class="form-control" required><br><br>
           </div>

           <div class= "mb-3">
               <label class="form-label"> Correo: </label><br>
               <input type = "email" name = "correo" class="form-control" required><br><br>
           </div>

            <button type="submit" class="btn btn-primary w-100">
                 <i class="bi bi-save me-2"></i> Guardar Usuario
            </button>

             //Botones de direccionamiento

        <div class="d-grid mt-3">
                <a href="crear_inscrip.php" class="btn btn-secondary">
                    <i class="bi bi-person-plus-fill me-2"></i> Reservar Clase
                </a>
            </div>

        <div class="d-grid mt-3">
                <a href="listar_usuario.php" class="btn btn-secondary">
                    <i class="bi bi-person-plus-fill me-2"></i> Usuario Registrado
                </a>
            </div>


        </form>
        </div> 
    </div>      
</body>        
</html>

<?php
    //Incluimos el archivo que contiene la conexió a la base de datos 
    require 'conexion.php';
    
    //Verificamos si el formulario fue enviado al método POST
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {

        //Obtenemos los datos enviados desde el formulario
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
    
        //Preparamos una consulta SQL segura para insertar los datos
        $consulta = $conexion -> prepare ("INSERT INTO usuarios (nombre, cedula, contraseña, edad, correo) VALUES (?, ?, ?, ?, ?)");
        
        //" ss" indica que se están enviando dos cadenas de texto (string, string)
        // bind_param: indica el tipo de dato que se desea enviar en estre caso "ss" string string
        $consulta -> bind_param("sssis", $nombre, $cedula, $contraseña, $edad, $correo);
        $consulta->execute();

           if ($consulta) {
             echo '<div class="container mt-4">
              <div class="alert alert-success text-center shadow-sm" role="alert" style="max-width: 500px; margin: 0 auto;">
                   <i class="bi bi-check-circle-fill me-2"></i>
                   Usuario registrado con éxito.
              </div>
              </div>';
            } else {
             echo '<div class="container mt-4">
                   <div class="alert alert-danger text-center shadow-sm" role="alert" style="max-width: 500px; margin: 0 auto;">
                   <i class="bi bi-x-circle-fill me-2"></i>
                    Error al registrar usuario. Intente nuevamente.
                   </div>
               </div>';
            }

        //Cerramos la consulta y la conexion
        $consulta -> close();
        $conexion -> close();
    }

?>

