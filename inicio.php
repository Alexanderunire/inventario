


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="bd-example mb-0" style="height: 80vh">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 80vh">
                    <img src="img/7.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 mb-4 font-weight-bold" style="color: white;">BIG BEAR</h5>
                        <p style="color: white;">VISITANOS, ESTAMOS PARA SERVIRTE</p>
                    </div>
                </div>
                <div class="carousel-item" style="height: 80vh">
                    <img src="img/20.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 mb-4 font-weight-bold" style="color: black;">BIG BEAR</h5>
                        <p style="color: withe;">VISITANOS, ESTAMOS PARA SERVIRTE</p>
                    </div>
                </div>
                <div class="carousel-item" style="height: 80vh">
                    <img src="img/45.jpeg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="display-4 mb-4 font-weight-bold" style="color: white;">BIG BEAR</h5>
                        <p style="color: withe;">VISITANOS, ESTAMOS PARA SERVIRTE</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
        <div class="text-white bg-success p-2">
		
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="navbar-nav mr-auto">
                <div class="offset-md-1 mr-auto text-center"></div>
                <a class="nav-item nav-link text-justify active ml-3 hover-primary" href="#">Inicio</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./listado.php">Listado pedidos</a>
                        <a class="dropdown-item" href="./pedidos.php">relizar pedido</a>

                    </div>
                </li>
                <a class="nav-item nav-link text-justify ml-3 hover-primary" href="./login.php">Salir</a>
            </div>
            <div class="text-center justify-content-center">
                <a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com">Facebook</a>
                <a class="btn btn-outline-danger" target="_blank" href="https://www.youtube.com">Youtube</a>
            </div>
        </div>

    </nav>
    <div class="">
        <div class="jumbotron bg-dark text-light rounded-0">
            <h1 class="display-4">Estilo y Confort</h1>
            <p class="lead"> Nuestro alamacen esta enfocado en la venta de ropa oversize, ofrecen una amplia variedad de prendas de vestir, que incluyen camisetas, sudaderas, pantalones, chaquetas, abrigos y vestidos, todos diseñados para proporcionar comodidad y estilo sin sacrificar el ajuste holgado característico.</p>
            <hr class="my-4 bg-light">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <p>visitanos, o compra ya!!</p>
                <a class="btn btn-outline-secondary" href="./pedidos.php" role="button">REALIZAR PEDIDO</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
