<?php
include('conexion_bd.php');

// Obtener datos del formulario
$nombreProducto = $_POST['nombreProducto'];
$urlImagen = $_POST['urlImagen'];
$precioProducto = $_POST['precioProducto'];

// Preparar y ejecutar la consulta para la tabla `recursos`
$queryRecursos = $conexion->prepare("INSERT INTO recursos (nombre, url, precio) VALUES (?, ?, ?)");
$queryRecursos->bind_param("ssd", $nombreProducto, $urlImagen, $precioProducto);


if ($queryRecursos->execute()) {
    // Si la inserción en la tabla `recursos` es exitosa, inserta en la tabla `productos`
    $queryProductos = $conexion->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
    $queryProductos->bind_param("sd", $nombreProducto, $precioProducto);

    if ($queryProductos->execute()) {
        echo "Producto agregado exitosamente en ambas tablas.";
    } else {
        echo "Error al agregar el producto en la tabla `productos`: " . $conexion->error;
    }
} else {
    echo "Error al agregar el producto en la tabla `recursos`: " . $conexion->error;
}

// Cerrar la conexión
$queryRecursos->close();
$queryProductos->close();
$conexion->close();
?>
