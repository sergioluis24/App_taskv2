<?php
include("Backend/data_articles.php");
if($_GET){
    $id_article = $_GET["id_article"]+1;
    $user_id = $_GET["user_id"];
    $data_article = get_table_articles ($mbd,$user_id);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap"
    rel="stylesheet">
  <!-- FontAwsome -->
  <script src="https://kit.fontawesome.com/65b6d5090a.js" crossorigin="anonymous"></script>
  <link href='core/main.css' rel='stylesheet' />
  <link href='daygrid/main.css' rel='stylesheet' />

    <script src='core/main.js'></script>
    <script src='daygrid/main.js'></script>

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
            <a class="nav-link" href="http://localhost/xampp/App_tasksV2/contacto.php">Contacto<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
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

    <div class="container-fluid mt-5">
        <i class="d-flex justify-content-center">
            <h2 class="display-4">Edicion</h2>
        </i>
    </div>
    <div class="data_article">
        <div class="tittle"><?php echo $data_article[$id_article-1]['title']?></div>
    </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="js/app.js"></script>
  <script src="js/calendar.js"></script>

</body>
</html>