<?php
session_start();
include ("Backend/data.php");
$data_articles = get_table_articles ($mbd);
$notification_tasks = difference_date($mbd);
$date_expected_month = date_expected_month ($mbd);
// var_dump($date_expected_month);
if(!isset($_SESSION['CC'])){
  header("location:login.php"); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App Task</title>
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
  <!-- Header -->
  <div class="container">
    <div class="row header">
      <div class="col-md-3">
        <i class="fas fa-dollar-sign ico-init"></i>
      </div>
      <div class="col-md-7">
        <p class="display-4 p-header">
          Bienvenido <?php echo $data_user[0]["nombre"];?> a tu aplicacion
          de tareas mas segura, sencilla y
          veloz
        </p>
      </div>
      <div class="col-md-2 text-center">
        <img src="Img/perfil.jpg" alt="" class="perfil">
        <div class="text-center my-3">
          <p class="mb-0"><?php echo $data_user[0]["nombre"]." ".$data_user[0]["apellido"];?></p>
          <p class="mt-0 data_email"><?php echo $data_user[0]["email"];?></p>
          <div class="fondo">
            <p class="titles_estate">Fondo</p>
            <p class="descript_state"><?php echo $data_user[0]["fund"];?>$</p>
          </div>
          <div class="tareas_articulos">
            <p class="titles_estate">Tareas/Articulos</p>
            <p class="descript_state"><?php echo $number_tasks[0]["number_tasks"];?>/<?php echo $number_articles[0]["number_articles"];?></p>
          </div>
        </div>
        <div class="fecha text-center">
         <button class="btn-calendar"  id="btn_calendar"> <i class="far fa-calendar-alt ico-2x"></i></button>
           <div id='calendar' class=""></div>
          <p class="mt-3 lead" id="current_date">##/##/####</p>
        </div>
        <div class="notification text-center">
          <i class="far fa-bell ico-2x notification-ico">
            <p class="notification-number d-flex justify-content-center align-items-center"><?php echo $notification_tasks[0]["notifications_tasks"]?></p>
          </i>
        </div>
      </div>
    </div>
    <!-- Section pestañas -->
    <hr class="my-5">
    <h2 class="text-center my-5">Lista de articulos</h2>
    <p class="lead mb-0">Tareas/Articulos</p>
    <i class="fas fa-toggle-on mt-0 mb-5 ico-toggle"></i>
    <!-- New collapse -->
    <?php foreach($data_articles as $data_article): ?>
    <div class="accordion my-4" id="accordionExample">
      <div class="card">
        <div class="card-header bg_blueLight" id="headingOne">
          <h2 class="mb-0 d-flex flex-column">
            <button class="btn title_pestañas" type="button" data-toggle="collapse" data-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              <?php echo $data_article["title"]?>
            </button>
            <button class="btn descript_pestañas" type="button" data-toggle="collapse" data-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              <?php echo $data_article["descripcion"]?>
            </button>

          </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body d-flex">
            <div class="time ml-3 mt-3" id="time">
              <p class="mb-0 text-card">Tiempo esperado:</p>
              <p class="mt-0 text-card"><?php echo $date_expected_month[0]['date_expected']?> Meses</p>
            </div>
            <div class="linea_lateral"></div>
            <div class="priority ml-3 mt-3" id="priority">
              <p class="text-card mb-0">prioridad:</p>
              <span class="badge badge-danger mt-0 text-card">High</span>
            </div>
            <div class="linea_lateral"></div>
            <div class="price ml-3 mt-3" id="price">
              <p class="text-card mb-0"><b>precio</b></p>
              <p class="text-card mt-0"><b>18,000.00$</b></p>
            </div>
            <div class="linea_lateral"></div>
            <div class="found_saved ml-3 mt-3" id="found_saved">
              <p class="text-card mb-0"> Fondo ahorrado</p>
              <p class="text-card mt-0">6,000.00$</p>
            </div>
            <div class="linea_lateral"></div>
            <div class="presupuesto_mensual ml-3 mt-3" id="presupuesto_mensual">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Presupuesto mensual
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Semanal</a>
                  <a class="dropdown-item" href="#">Quincenal</a>
                  <a class="dropdown-item" href="#">Anual</a>
                </div>
              </div>
              <p class="text-card mt-0">2,000.00$</p>
            </div>
          </div>
          <div class="card_description">
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo minima, ad cum nobis tempore cupiditate
              pariatur consequatur dolorum sint asperiores temporibus odio quis iure quidem libero tenetur laboriosam
              dicta eos vitae quisquam quod ducimus rem aut sapiente! Excepturi recusandae distinctio error blanditiis
              ab? Ipsa, doloribus? Accusantium provident aliquid blanditiis culpa.
            </p>
          </div>
          <div class="buttons-group-operations mt-4 mb-3">
            <button class="btn btn-comprado mr-2">Comprado</button>
            <button class="btn btn-agregar mr-2">agregar
              <i class="fas fa-dollar-sign ico-agregar"></i>
            </button>
            <button class="btn btn-editar mr-2">editar
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-eliminar">elimnar
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <!-- Button add task or article -->
    <button class="btn bg_blueLight btnNewPestaña mt-4 mb-5">
      <i class="fas fa-plus text-white btn-plus-pestaña"></i>
    </button>
  </div>
  <!-- footer -->
  <footer class="footer d-flex align-items-center">
    Derechos reservados a Sergio Luis Hernandez Cruz ©
  </footer>
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