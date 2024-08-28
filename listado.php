<?php
include('conexion_bd.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .elemento1 {
            margin-top: 10px;
            margin-left: 90px;
            padding: 10px 10px;
        }
        .elemento2 {
            margin-top: -60px;
            margin-left: 930px;
            padding: 10px 20px;
        }
        .mi-td-con-botones {
            margin-top: 5px; /* Ajusta el valor según sea necesario */
        }
    </style>
</head>
<body>
    <div class="elemento1">
        <a class="btn btn-outline-secondary" href="./pedidos.php" role="button">Atrás</a>
    </div>
   
    <div class="container">
        <h2>Lista de Productos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="background-color: #ccc;">Producto</th>
                    <th style="background-color: #ccc;">Talla</th>
                    <th style="background-color: #ccc;">Color</th>
                    <th style="background-color: #ccc;">Marca</th>
                    <th style="background-color: #ccc;">Precio</th>
                    <th style="background-color: #ccc;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM productos";
                $resultado = mysqli_query($conexion, $sql);

                $precioTotal = 0; // Inicializamos la variable para el precio total
                $contador = 0;
                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $precio = floatval($fila['precio']); // Convertir el precio a float
                        echo "<tr style='background-color: " . ($contador % 2 == 0 ? '#fff' : '#ccc') . ";'>";
                        echo "<td>" . htmlspecialchars($fila['producto']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['talla']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['color']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['marca']) . "</td>";
                        echo "<td>$" . number_format($precio, 2) . "</td>";
                      
                        // Sumamos el precio al precio total
                        $precioTotal += $precio;

                        echo "<td>";
                            echo "<a href='./editar_producto.php?id=" . urlencode($fila['id']) . "' class='btn btn-outline-secondary'>Editar</a>&nbsp;";
                            echo "<a href='./eliminar_producto.php?id=" . urlencode($fila['id']) . "' class='btn btn-outline-secondary'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                        $contador++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron productos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- Mostrar el precio total -->
        <p>Precio Total: $<?php echo number_format($precioTotal, 2); ?></p>
        <div class="elemento2">
            <a class="btn btn-outline-secondary" href="./generar.php" role="button">Generar Recibo</a>
        </div>
    </div>

    <!-- Agrega la referencia a Bootstrap JS al final del cuerpo -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
mysqli_close($conexion);
?>
