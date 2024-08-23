<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compra o Venta</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .navbar {
            margin: 0 auto;
            width: fit-content;
        }
        .jumbotron {
            text-align: center;
        }
        .btn {
            width: 150px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="navbar-nav">
            <li class="nav-item dropdown">
                
                <div class="dropdown-menu" aria-labelledby="menuDropdown">
                    <a class="dropdown-item" href="./pedidos.php">Comprar</a>
                    <a class="dropdown-item" href="./listado.php">Vender</a>
                </div>
            </li>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron bg-dark text-light">
            <h1 class="display-4">Compra o Venta</h1>
            <p class="lead">Seleccione la opción que desea realizar.</p>
            <hr class="my-4 bg-light">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-success btn-lg" href="./pedidos.php" role="button">Comprar</a>
                <a class="btn btn-outline-warning btn-lg" href="./vender.php" role="button">Vender</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
