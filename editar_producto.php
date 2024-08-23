<?php
include('conexion_bd.php');

// Verificar si se ha enviado un formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nuevaTalla = $_POST['talla'];
    $nuevoColor = $_POST['color'];
    $nuevaMarca = $_POST['marca'];

    // Realizar la actualización en la base de datos
    $sql = "UPDATE productos SET talla = '$nuevaTalla', color = '$nuevoColor', marca = '$nuevaMarca' WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        echo "Producto actualizado correctamente.";
        header("location:listado.php");

    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }
} else {
    // Obtener el ID del producto a editar de la URL
    $id = $_GET['id'];

    // Consulta para obtener los datos actuales del producto
    $sql = "SELECT * FROM productos WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) === 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $talla_actual = $fila['talla'];
        $color_actual = $fila['color'];
        $marca_actual = $fila['marca'];
    } else {
        echo "Producto no encontrado.";
        
        exit; // Salir del script si el producto no se encuentra
    }
}

mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <!-- Agregar la referencia a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>



<div class="container">
    <h2>Editar Producto</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="talla">Talla:</label>
            <input type="text" class="form-control" id="talla" name="talla" value="<?php echo $talla_actual; ?>">
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" id="color" name="color" value="<?php echo $color_actual; ?>">
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $marca_actual; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<!-- Agregar la referencia a Bootstrap JS al final del cuerpo -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
