<?php
session_start();
if(!isset($_SESSION["CC"])){
    header("location:login.php"); 
  }
  
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/65b6d5090a.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg_blueDark">
        <div class="container">
            <div class="ico-menu">
                <a href="http://localhost/xampp/App_tasksV2/index.php?presupuesto=Mensual">
                    <i class="fas fa-sticky-note text-white h5"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/xampp/App_tasksV2/contacto.php">Contacto<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://localhost/xampp/App_tasksV2/perfilEdit.php">Editar perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/xampp/App_tasksV2/Backend/cerrar_sesion.php">Cerrar sesion</a>
                    </li>

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
    <!-- Edit -->
    <div class="container-edit container ">
        <div class="row">
            <div class="col-md-3">
                <i class="fas fa-dollar-sign ico-init"></i>
            </div>
            <div class="col-md-9">
                <h2 class="display-4 mb-5">Contacto</h2>
                <div>
                    <p class="mb-0" style="font-size: 24px;">
                        Telefono:
                    </p>
                    <p style="font-weight: 300;" class="mt-0"> <em>829-654-6259</em></p>
                </div>            
                <div class="email">
                    <p class="mb-0" style="font-size: 24px;">
                        Email:
                    </p>
                    <p style="font-weight: 300;" class="mt-0"> <em>sergioluisl2324@gmail.com</em></p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>