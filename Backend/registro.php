<?php 
include('conexion.php');


if($_POST){
$id= NULL;   
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$tasks=0;
$fund=0.00;
echo("  ".$nombre);
echo(" ".$apellidos);
echo(" ".$password);
echo(" ".$email);

$query_add_user = "INSERT INTO users (id, nombre, apellido, email, passowrd, tasks, fund) VALUES (:id, :nombre, :apellido, :email, :passowrd, :tasks, :fund)";
$sentencia_add_user = $mbd->prepare($query_add_user);
$sentencia_add_user->bindParam(':id', $id);
$sentencia_add_user->bindParam(':nombre', $nombre);
$sentencia_add_user->bindParam(':apellido', $apellidos);
$sentencia_add_user->bindParam(':email', $email);
$sentencia_add_user->bindParam(':passowrd', $password);
$sentencia_add_user->bindParam(':tasks', $tasks);
$sentencia_add_user->bindParam(':fund', $fund);
if($sentencia_add_user->execute()){
    echo ("datos guardados correctamente");
}else{
    echo ("Error no se han mandado correctamente los datos");
}
}