<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Talla, Color y Marca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f8f8;
        }

        .titulo-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .titulo {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
            text-align: center;
            flex-grow: 1;
        }

        .btn-container {
            display: flex;
            gap: 10px;
        }

        .btn-container a,
        .btn-container button {
            font-weight: 400;
            color: #6c757d;
            text-align: center;
            background-color: transparent;
            border: 1px solid #6c757d;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-container a:hover,
        .btn-container button:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .producto-container {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            width: 100%;
            padding-top: 20px;
        }

        .producto {
            width: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 10px;
            border: 1px solid #888;
            width: 80%;
            max-width: 700px;
            position: relative;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[readonly],
        input {
            border: none;
            background-color: transparent;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
            text-align: left;
        }

        select {
            padding: 10px;
            font-size: 16px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
        }

        .btn-agregar-producto {
            position: fixed;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
        }

        .btn-comprar {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>
    <div class="titulo-container">
        <a class="btn-container btn btn-atras" href="./inicio.php" role="button">regresar</a>
        <div class="titulo">SECCION DE VENTAS prueba cambio</div>
        <div class="btn-container">
            <button class="btn btn-agregar-producto" onclick="mostrarModalAgregar()">Agregar Producto</button>
            <a class="btn btn-comprar" href="./pedidos.php" role="button">Comprar</a>
        </div>
    </div>

    <div class="producto-container" id="productoContainer">
        <!-- Cargar los productos desde la base de datos -->
        <?php
        include('conexion_bd.php');
        $query = "SELECT * FROM recursos";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="producto">
                    <img src="' . $row["url"] . '" onclick="mostrarModal(\'' . $row["nombre"] . '\', \'' . $row["precio"] . '\')">
                    <div>' . $row["nombre"] . '</div>
                </div>';
            }
        } else {
            echo '<p>No hay productos disponibles.</p>';
        }

        $conexion->close();
        ?>
    </div>

    <!-- Modal para Agregar Nuevo Producto -->
    <div id="modalAgregarProducto" class="modal">
        <div class="modal-content">
            <span class="close" onclick="ocultarModalAgregar()">&times;</span>
            <h2>Agregar Nuevo Producto</h2>
            <form id="formAgregarProducto" action="guardar_producto.php" method="post" onsubmit="return agregarProducto()">
                <label for="nombreProducto">Nombre del Producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto" required>

                <label for="urlImagen">URL de la Imagen:</label>
                <input type="text" id="urlImagen" name="urlImagen" required>

                <label for="precioProducto">Precio:</label>
                <input type="text" id="precioProducto" name="precioProducto" required>

                <div class="btn-container">
                    <button type="submit">Agregar Producto</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function mostrarModalAgregar() {
            document.getElementById("modalAgregarProducto").style.display = "block";
        }

        function ocultarModalAgregar() {
            document.getElementById("modalAgregarProducto").style.display = "none";
        }

        function agregarProducto() {
            var nombre = document.getElementById("nombreProducto").value;
            var url = document.getElementById("urlImagen").value;
            var precio = document.getElementById("precioProducto").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "guardar_producto.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Actualiza el contenedor de productos con la respuesta
                    var productoContainer = document.getElementById("productoContainer");
                    productoContainer.innerHTML += `
                        <div class="producto">
                            <img src="${url}" onclick="mostrarModal('${nombre}', '${precio}')">
                            <div>${nombre}</div>
                        </div>
                    `;
                    ocultarModalAgregar();
                }
            };
            xhr.send("nombreProducto=" + encodeURIComponent(nombre) + "&urlImagen=" + encodeURIComponent(url) + "&precioProducto=" + encodeURIComponent(precio));
            return false; // Evita que el formulario se envíe y recargue la página
        }
    </script>
</body>

</html>
