<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Talla, Color y Marca</title>
    <!-- Importar Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-container {
            display: flex;
            gap: 10px;
        }

        .btn-container a {
            text-decoration: none;
            color: #6c757d;
            border: 1px solid #6c757d;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out;
        }

        .btn-container a:hover {
            color: #fff;
            background-color: #6c757d;
        }

        .titulo-seccion {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            text-align: center;
            flex-grow: 1;
        }

        .producto-container {
            margin-top: 80px;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
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

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-container button {
            background-color: transparent;
            border: 1px solid #6c757d;
            color: #6c757d;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.2rem;
            cursor: pointer;
        }

        .btn-container button:hover {
            background-color: #6c757d;
            color: #fff;
        }
        
        /* Estilo para mover los botones Carrito y Vender a la derecha */
        .header .btn-container.right-buttons {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="btn-container">
            <a class="btn btn-atras" href="./inicio.php" role="button">Atrás</a>
        </div>
        <div class="titulo-seccion">SECCIÓN DE COMPRAS</div>
        <div class="btn-container right-buttons">
            <a class="btn btn-carrito" href="./listado.php">Carrito</a>
            <a class="btn btn-vender" href="./vender.php">Vender</a>
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
            echo "<p>No hay productos disponibles.</p>";
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

    <!-- Modal para detalles del producto -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="ocultarModal()">&times;</span>
            <h2>Detalles del Producto</h2>
            <form action="guardar.php" method="post" onsubmit="return validarFormulario()">
                <p id="precioProductoModal"></p>
                <label for="talla">Talla:</label>
                <select id="talla" name="talla" required>
                    <option value="">Seleccionar talla</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>

                <label for="color">Color:</label>
                <select id="color" name="color" required>
                    <option value="">Seleccionar color</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Azul">Azul</option>
                    <option value="Verde">Verde</option>
                </select>

                <label for="marca">Marca:</label>
                <select id="marca" name="marca" required>
                    <option value="">Seleccionar marca</option>
                    <option value="Marca A">Marca A</option>
                    <option value="Marca B">Marca B</option>
                    <option value="Marca C">Marca C</option>
                </select>

                <input type="hidden" id="producto" name="producto">
                <input type="hidden" id="precio" name="precio">

                <div class="btn-container">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function mostrarModal(nombreProducto, precio) {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("producto").value = nombreProducto;
            document.getElementById("precio").value = precio;
            document.getElementById("precioProductoModal").innerHTML = "Precio: $" + precio;
        }

        function ocultarModal() {
            document.getElementById("myModal").style.display = "none";
        }

        function mostrarModalAgregar() {
            document.getElementById("modalAgregarProducto").style.display = "block";
        }

        function ocultarModalAgregar() {
            document.getElementById("modalAgregarProducto").style.display = "none";
        }

        function agregarProducto() {
            ocultarModalAgregar();
            return true;
        }

        function validarFormulario() {
            var talla = document.getElementById("talla").value;
            var color = document.getElementById("color").value;
            var marca = document.getElementById("marca").value;

            if (talla === "" || color === "" || marca === "") {
                alert("Por favor, completa todos los campos.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>