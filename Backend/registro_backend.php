<?php
include('conexion.php');


if ($_POST) {
    $id = NULL;
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $tasks = 0;
    $fund = 0.00;
    // Cifrado pass
    $password;
    $password_hash =password_hash($password, PASSWORD_DEFAULT);


    $query_add_user = "INSERT INTO users (id, nombre, apellido, email, password, tasks, fund) VALUES (:id, :nombre, :apellido, :email, :password, :tasks, :fund)";
    $sentencia_add_user = $mbd->prepare($query_add_user);
    $sentencia_add_user->bindParam(':id', $id);
    $sentencia_add_user->bindParam(':nombre', $nombre);
    $sentencia_add_user->bindParam(':apellido', $apellidos);
    $sentencia_add_user->bindParam(':email', $email);
    $sentencia_add_user->bindParam(':password', $password_hash);
    $sentencia_add_user->bindParam(':tasks', $tasks);
    $sentencia_add_user->bindParam(':fund', $fund);
    if ($sentencia_add_user->execute()) {
        // echo ("datos guardados correctamente");
        header('location:verificado.php');
    } else {
        echo ("Error no se han mandado correctamente los datos");
    }
}
