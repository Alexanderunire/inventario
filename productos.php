<?php
include("conexion_bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_p = $_POST["nombre_p"];
    $precio = $_POST["precio"];

    $consulta = "INSERT INTO productos (nombre_p, precio) VALUES ('$nombre_p', '$precio')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Registro exitoso. <a href='login.php'>Inicia sesión</a>";
    } else {
        echo "Error en el registro. <a href='registro.php'>Volver</a>";
    }
}
header("location:login.php");
?>