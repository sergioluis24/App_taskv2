<?php
include("conexion.php");
session_start();
$_SESSION["errores"]=NULL;
$data_aux;
function read_users($mbd, $email_login, $password_login)
{
     $email_login_aux = $email_login;
    $password_login_aux = $password_login;
    $query_read_user = "SELECT * FROM users WHERE email = ?";
    $sentencia_leer_user = $mbd->prepare($query_read_user);
    $sentencia_leer_user->execute(array($email_login_aux));
    $data_user = $sentencia_leer_user->fetchall();
    if ($data_user) {
        if (password_verify($password_login_aux, $data_user[0]["password"])) {
            $nombre_user = $data_user[0]["nombre"]; 
            $_SESSION["CC"] = $nombre_user;
            $_SESSION["user_id"] = $data_user[0]["id"];
            echo "Entre al pass";
            return $data_user;
        } else {
            return "Su contraseña no es valida";
        }
    }else{
        return "Su email no es valido";
    }
}
function valid_post($mbd){

    if ($_POST) {
        $email_login = $_POST["email"];
        $password_login = $_POST["password"];
        $data_int= read_users($mbd, $email_login, $password_login); 
        if($data_int==="Su contraseña no es valida"){
            $_SESSION["errores"]= $data_int;
            header("location:verificar_session.php");
        }else if($data_int === "Su email no es valido"){
            $_SESSION["errores"]= $data_int;    
            header("location:verificar_session.php");
        }else {
            header("location:verificar_session.php");
        }
        return $data_int;
    }
}

$data_aux = valid_post($mbd);