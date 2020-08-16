<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro completado</title>
    <!-- Booststrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg_blueDark">
        <div class="container">
            <div class="ico-menu">
                <a href="http://localhost/xampp/App_tasksV2/">
                    <i class="fas fa-sticky-note text-white h5"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/xampp/App_tasksV2/contacto.html">Contacto<span class="sr-only">(current)</span></a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="http://localhost/xampp/App_tasksV2/perfilEdit.html">Editar perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/xampp/App_tasksV2/login.html">Cerrar sesion</a>
                    </li> -->

                    <li class="nav-item dropdown">
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- Header -->
    <div class="container">
        <h1 class="display-4 my-5 pt-5">Usted a podido registrarse bienvenido a apptask!</h1>   
        <hr>
        <p class="lead">Ahora has tu primer inicio de sesion</p>
        <button class="btn bg_blueDark text-white">
        <a href="http://localhost/xampp/App_tasksV2/login.php">Login</a>
        </button>
    </div>
</body>
</html>