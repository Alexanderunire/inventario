<?php
include("conexion_bd.php");

// Obtener el ID de la persona a editar si se proporciona
$id = isset($_GET['id']) ? $_GET['id'] : '';
$persona = null;

if (!empty($id)) {
    $consulta_persona = "SELECT * FROM usuario WHERE id = $id";
    $resultado_persona = mysqli_query($conn, $consulta_persona);
    $persona = mysqli_fetch_array($resultado_persona);
}
?>
<html>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>personas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <div class="alert alert-primary text-center" role="alert">
            <h3>Crear nueva persona</h3>
            <a href="./login.php" class="btn btn-outline-warning">Atrás</a>
        </div>
        <fieldset>
            <legend>Datos basicos</legend>
            <form class="form-control" method="POST" action="./procesardato.php">
              <div class="row">
               
                <div class="col-6">
                    <div class="from-group">
                        <label for="usuario">Usuario</label>
                        <input class="form-control" id="usuario" name="usuario" value="<?php echo isset($usuario['usuario']) ? $usuario['usuario'] : ''; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input class="form-control" id="clave" name="clave" value="<?php echo isset($usuario['clave']) ? $usuario['clave'] : ''; ?>">
                        </div>
                
              </div>
              <div class="from-group">
                <input class="btn btn-outline-danger" type="submit" id="btnEnviar" name="btnEnviar"a href="./procesardato.php value="Guardar">
              <button class="btn btn-outline-info" type="button"> Limpiar </button> 
             </div>
            </form>
        </fieldset>  
         </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>