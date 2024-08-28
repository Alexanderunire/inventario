<?php
include('conexion_bd.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza la eliminación del producto en la base de datos
    $sql = "DELETE FROM productos WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
} else {
    echo "ID de producto no válido.";
}

mysqli_close($conexion);

// Redirecciona al listado de productos después de la eliminación
header("Location: listado.php");
exit;
?>
