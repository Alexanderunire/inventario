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
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f8f8;
        }
        .producto-container {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        .producto {
            max-width: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        img {
            max-width: 100px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
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
        input[readonly] {
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
            margin-top: 360px;
            margin-left: 550px;
            text-align: right;
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

        .btn-container {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .btn-carrito {
            position: absolute;
            margin-top: 150px;
            margin-left: 370px;
            

        }
        .btn-carrito {
            display: inline-block;
            font-weight: 400;
            color: #6c757d;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid #6c757d;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            text-decoration: none;
        }
        .btn-carrito:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-atras {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .btn-atras {
            display: inline-block;
            font-weight: 400;
            color: #6c757d;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid #6c757d;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            text-decoration: none;
        }

        .btn-atras:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-atras"  href="./inicio.php" role="button" style="float: left;">Atrás</a>
        <a class="btn btn-carrito" href="./listado.php" style="float: right;">Carrito</a>
    </div>
    <div class="producto-container">
        <!-- Imágenes con detalles de productos -->
        <div class="producto">
            <img id="imagenProducto1"
                src="https://myself23.com/wp-content/uploads/2022/09/B44-scaled.jpg"
                onclick="mostrarModal('Camiseta', '20.00')">
            <div>Camiseta</div>
        </div>

        <div class="producto">
            <img id="imagenProducto2"
                src="https://static.dafiti.com.co/p/mattelsa-5788-0319212-1-zoom.jpg"
                onclick="mostrarModal('Pantalon', '30.00')">
            <div>Pantalon</div>
        </div>

        <div class="producto">
            <img id="imagenProducto3"
                src="https://static.dafiti.com.co/p/mattelsa-6226-6665202-1-zoom.jpg"
                onclick="mostrarModal('Chaqueta', '40.00')">
            <div>Chaqueta</div>
        </div>

        <div class="producto">
            <img id="imagenProducto4"
                src="https://images.prom.ua/4549488644_w640_h640_4549488644.jpg"
                onclick="mostrarModal('Zapatos', '50.00')">
            <div>Zapatos</div>
        </div>

        <div class="producto">
            <img id="imagenProducto5"
            src="https://static.dafiti.com.co/p/mattelsa-4557-2269191-1-product.jpg"
                onclick="mostrarModal('Blusa', '25.00')">
            <div>Blusa</div>
        </div>
    </div>

    <!-- El modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="ocultarModal()">&times;</span>
            <h2>Detalles del Producto</h2>
            <form action="guardar.php" method="post" onsubmit="return validarFormulario()">

            <!-- Formulario de selección de talla, color y marca -->
            <form action="guardar.php" method="post">
                <label for="producto">Producto:</label>
                <input type="text" id="producto" name="producto" readonly>

                <label for="talla">Talla:</label>
                <select id="talla" name="talla">
                    <option value="">Seleccionar Talla</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                </select>

                <label for="color">Color:</label>
                <select id="color" name="color">
                    <option value="">Seleccionar Color</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Verde">Verde</option>
                    <option value="Azul">Azul</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Morado">Morado</option>
                    <option value="Gris">Gris</option>
                </select>

                <label for="marca">Marca:</label>
                <select id="marca" name="marca">
                    <option value="">Seleccionar Marca</option>
                    <option value="Nike">Nike</option>
                    <option value="Vans">Vans</option>
                    <option value="SuperDry">SuperDry</option>
                    <option value="DC">DC</option>
                </select>

                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" readonly>

                <div class="btn-container">
                    <button class="btn btn-outline-secondary" role="button">Agregar Al Carrito</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para mostrar el modal
        function mostrarModal(producto, precio) {
            document.getElementById('myModal').style.display = 'block';
            document.getElementById('producto').value = producto;
            document.getElementById('precio').value = precio;
        }

        // Función para ocultar el modal
        function ocultarModal() {
            document.getElementById('myModal').style.display = 'none';
        }
        function validarFormulario() {
            var talla = document.getElementById('talla').value;
            var color = document.getElementById('color').value;
            var marca = document.getElementById('marca').value;

            if (talla === '' || color === '' || marca === '') {
                alert('Por favor, seleccione talla, color y marca.');
                return false; // Evita que el formulario se envíe
            }

            return true; // Envía el formulario si todo está seleccionado
        }

        
    </script>

</body>

</html>