<?php
include('conexion_bd.php');
// Resto del código para procesar el formulario y guardar los datos en la base de datos
$producto = $_POST['producto'];
$talla = $_POST['talla'];
$color = $_POST['color'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];


$sql = "INSERT INTO productos (producto, talla, color, marca, precio) VALUES ('$producto','$talla', '$color', '$marca','$precio')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}
mysqli_close($conexion);
header("location:pedidos.php");
?>
