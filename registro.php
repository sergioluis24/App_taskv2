<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap"
        rel="stylesheet">
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/65b6d5090a.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-md-6 bg_blueDark container-left d-flex justify-content-center align-items-center flex-column">
                <i class="fas fa-user text-white mt-5" style="font-size: 20rem;"></i>
                <p class="text-white" style="font-size: 4.6rem; margin-bottom: 15rem">Registrate!</p>
            </div>
            <div class="col-md-6">
                <div class="form-group-regist d-flex justify-content-center flex-column align-items-center">
                    <form action="Backend/registro_backend.php" method="POST" class="d-flex justify-content-center flex-column align-items-center w-100" onsubmit="return validar_registro()">
                        <input type="text" class=" form-regist text-center" placeholder="Nombre" required id="nombre" name="nombre">
                        <div class="line_forms mb-5"></div>
                        <input type="text" class=" form-regist text-center" placeholder="Apellidos" required id="apellidos" name="apellidos">
                        <div class="line_forms mb-5"></div>
                        <input type="email" class=" form-regist text-center" placeholder="Email" required id="email" name="email">
                        <div class="line_forms mb-5"></div>
                        <input type="password" class=" form-regist text-center" placeholder="Contraseña" required id="password" name="password">
                        <div class="line_forms mb-5"></div>
                        <input type="password" class=" form-regist text-center" placeholder="Repite la contraseña" required id="password_verif" name="password_verif">
                        <div class="line_forms mb-5"></div>
                        <div class="butto-group-regist">
                            <input type="submit" class="btn bg_blueDark text-white d-block btn-form-regist" value="Registrar" id="btn_registrar">
                            <button class="btn bg_blueDark text-white d-block btn-form-regist"><a href="http://localhost/xampp/App_tasksV2/login.html">Ya tengo una cuenta</a></button>
                        </div>
       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="backend/validacionRegistro.js"></script>
</body>

</html>