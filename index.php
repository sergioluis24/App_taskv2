<?php
session_start();
include ("Backend/data.php");
$user_id = $_SESSION['user_id'];
// echo $_SESSION['user_id'];
// if($number_tasks == 0){
//   $number_tasks = 0;
//   echo "entre";
// }
// var_dump($number_tasks);
$data_articles = get_table_articles ($mbd,$user_id);
$notification_tasks = difference_date($mbd,$user_id);
// $date_expected_month = date_expected_mounth ($mbd,$user_id);
// $presupuesto_mounth = calculated_mounth($mbd,$user_id);
$date_expected_days = date_expected_days($mbd,$user_id);
$date_expected = valid_dropdown($mbd,$user_id);
$valid_dropdown_echo = valid_dropdown_echo();
$presupuesto = calculated_presupuesto($mbd,$user_id);
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap"
    rel="stylesheet">
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/65b6d5090a.js" crossorigin="anonymous"></script>
    <link href='core/main.css' rel='stylesheet' />
    <link href='daygrid/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/styles.css">

    <script src='core/main.js'></script>
    <script src='daygrid/main.js'></script>
</head>

<body>

<?php if(isset($_GET["error"]) AND $_GET["error"] === "No tienes fondos suficientes"):?>
<div class="modal_personal py-4 bg-danger text-white w-50 d-flex justify-content-center align-items-center">
  <p class="my-0">No puedes comprar este articulo, insufientes fondos</p>
</div>
<?php endif;?>

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
            <p class="descript_state"><?php 
            if($number_tasks != 0){
              echo $number_tasks[0]["number_tasks"];
            }else{echo '0';}?>/<?php 
            if($number_articles != 0){
             echo $number_articles[0]["number_articles"];
            }else {echo '0';}
            ?>
            </p>
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
    
    <?php for($i = 0; $i<count($data_articles); $i++):?>
    <div class="accordion my-4" id="accordionExample<?php echo $i?>">
      <div class="card">
        <div class="card-header bg_blueLight" id="headingOne<?php echo $i?>">
          <h2 class="mb-0 d-flex flex-column">
            <button class="btn title_pestañas" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i?>"
              aria-expanded="true" aria-controls="collapseOne<?php echo $i?>">
              <?php echo $data_articles[$i]["title"]?>
            </button>
            <button class="btn descript_pestañas" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i?>"
              aria-expanded="true" aria-controls="collapseOne<?php echo $i?>">
              
            </button>

          </h2>
        </div>

        <div id="collapseOne<?php echo $i?>" class="collapse show" aria-labelledby="headingOne<?php echo $i?>" data-parent="#accordionExample<?php echo $i?>">
          <div class="card-body d-flex">
            <div class="time ml-3 mt-3" id="time">
              <p class="mb-0 text-card">Tiempo esperado:</p>
              <p class="mt-0 text-card" id = "days_expected"><?php echo $date_expected[$i]["date_expected"];?></p>
            </div>
            <div class="linea_lateral"></div>
            <div class=" ml-3 mt-3 priority" id="priority">
              <p class="text-card mb-0">prioridad:</p>
              <span class="text-white  badge badge-<?php
              if($data_articles[$i]["id_priority"] == 1){
                echo "Normal";
              }else if($data_articles[$i]["id_priority"] == 2){
                echo "Medium";
              }else{
                echo "High";
              }
              ?> mt-0 text-card badge_edit"><?php
              if($data_articles[$i]["id_priority"] == 1){
                echo "Normal";
              }else if($data_articles[$i]["id_priority"] == 2){
                echo "Medium";
              }else{
                echo "High";
              }
              ?></span>
            </div>
            <div class="linea_lateral"></div>
            <div class="price ml-3 mt-3" id="price">
              <p class="text-card mb-0"><b>precio</b></p>
              <p class="text-card mt-0"><b><?php echo $data_articles[$i]["price"]?>$</b></p>
            </div>
            <div class="linea_lateral"></div>
            <div class="found_saved ml-3 mt-3" id="found_saved">
              <p class="text-card mb-0"> Fondo ahorrado</p>
              <p class="text-card mt-0"><?php echo $data_articles[$i]["ahorrado"]?>$</p>
            </div>
            <div class="linea_lateral"></div>
            <div class="presupuesto_mensual ml-3 mt-3" id="presupuesto_mensual">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $i?>"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $valid_dropdown_echo;?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="http://localhost/xampp/App_tasksV2/index.php?presupuesto=Semanal">Semanal</a>
                  <a class="dropdown-item" href="http://localhost/xampp/App_tasksV2/index.php?presupuesto=Quincenal">Quincenal</a>
                  <a class="dropdown-item" href="http://localhost/xampp/App_tasksV2/index.php?presupuesto=Anual">Anual</a>
                </div>
              </div>
              <p class="text-card mt-0 <?php 
                            if(can_buy($mbd,$user_id,$i)){

                              echo "";
                            }else{
                              echo "text-success";
                            }
              
              ?>"><?php
              
              if(can_buy($mbd,$user_id,$i)){

                echo $presupuesto[$i];
              }else{
                echo "<b>Ya lo puedes comprar!<b>";
              }
              ?>
               </p>
            </div>
          </div>
          <div class="card_description">
            <hr>
            <p>
            <?php echo $data_articles[$i]["descripcion"]?>
            </p>
          </div>
          <div class="buttons-group-operations mt-4 mb-3">
            <button class="btn btn-comprado mr-2"><a href="Backend/verify_buy.php?article_id=<?php echo $data_articles[$i]["id"]?>&user_id=<?php echo $user_id?>">Comprado</a></button>
            <button class="btn btn-agregar mr-2" id = "agregar_btn"><a href="index.php?presupuesto=Mensual&agregar=<?php echo $i?>">agregar</a> 
              <i class="fas fa-dollar-sign ico-agregar"></i>
            </button>
            <button class="btn btn-editar mr-2"><a href="edit.php?id_article=<?php echo $i?>&user_id=<?php echo $user_id?>">editar</a>
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-eliminar">elimnar
              <i class="fas fa-times"></i>
            </button>
              <div class="agregar_form form-group w-50 mt-4 ml-4" id='agregar_form <?php echo $i?>'>
              <?php if(isset($_GET["agregar"]) && !isset($_GET["agregado"])):
                $agregar_id = $_GET["agregar"];
                if($i == $agregar_id):

              ?>
                <form method="POST" action = "Backend/agregar_fondo.php?id=<?php echo $i?>">
                  <input type="number" name="agregar_input" id="" class = "form-control " placeholder = '0'>
                  <button class="btn btn-primary mt-3 ml-2" type= "submit">Aceptar</button>
                  </form>
              <?php endif;?>
              <?php endif;?>
              <?php if(isset($_GET["agregado"]  )):
                 $agregado_id = $_GET["id_agregado"];
                 if($i == $agregado_id):
 
               ?>

                <p class = "py-4 px-3 bg-success text-white">Ha agregado fondos correctamente</p>
                <?php endif;?>
              <?php endif;?>
              </div>
          </div>
        </div>
      </div>
    </div>
    <?php endfor;?>
    <!-- Button add task or articles -->
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