<?php
// include ("Backend/login_backend.php");
session_start();
// if(isset($_SESSION["errores"])){
//     var_dump($_SESSION["errores"]);
// }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap"
        rel="stylesheet">
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/65b6d5090a.js" crossorigin="anonymous"></script>
    <script src="Backend/login.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-md-6 bg_blueDark container-left d-flex justify-content-center align-items-center flex-column">
                <i class="fas fa-coins text-white ico-coins mt-5"></i>
                <p class="text-white" style="font-size: 4.6rem; margin-bottom: 15rem">Login</p>
            </div>
            <div class="col-md-6">
                <div class="form-group-regist d-flex justify-content-center flex-column align-items-center">
                    <form action="Backend/login_backend.php" method="POST" onsubmit="return validar_login()" class="d-flex justify-content-center flex-column align-items-center w-100">
                        <input type="email" class=" form-regist text-center" placeholder="Email" name="email" id="email" required>
                        <div class="line_forms mb-5"></div>
                        <input type="password" class=" form-regist text-center" placeholder="Contraseña" name="password" id="password" required>
                        <div class="line_forms mb-5"></div>
                        <?php if(isset($_SESSION["errores"])): ?>
                        <?php echo "<p class='msg_error'>".$_SESSION["errores"]."</p>" ?>
                        <?php endif; ?>
                        <button class="btn bg_blueDark text-white d-block btn-form-regist" type="submit">
                            <i class="fas fa-arrow-right ico-arrow text-white"></i>
                        </button>
                        <button class="btn bg_blueDark text-white d-block btn-form-regist">
                            <a href="http://localhost/xampp/App_tasksV2/registro.php">Registrate</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>