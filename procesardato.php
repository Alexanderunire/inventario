<?php
include("conexion_bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $consulta = "INSERT INTO usuario (usuario, clave) VALUES ('$usuario', '$clave')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Registro exitoso. <a href='login.php'>Inicia sesión</a>";
    } else {
        echo "Error en el registro. <a href='registro.php'>Volver</a>";
    }
}
header("location:login.php");
?>