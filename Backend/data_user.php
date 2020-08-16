<?php
include("conexion.php");

function get_table_users ($mbd){
    $user_id = $_SESSION["user_id"];
    $query_read_users = "SELECT * FROM users WHERE id = ?";
    $sentencia_leer_users = $mbd->prepare($query_read_users);
    $sentencia_leer_users->execute(array($user_id));
    $data_user = $sentencia_leer_users->fetchall();
    return $data_user;
}
function get_number_tasks ($mbd){
    $user_id = $_SESSION["user_id"];
    $query_read_users = "SELECT count(id) AS 'number_tasks' FROM tasks GROUP BY(user_id)";
    $sentencia_leer_users = $mbd->prepare($query_read_users);
    $sentencia_leer_users->execute();
    $data_user = $sentencia_leer_users->fetchall();
    if($data_user){
        return $data_user;
    }else{
        return $data_user = 0;
    }
}
function get_number_article ($mbd){
    $user_id = $_SESSION["user_id"];
    $query_read_users = "SELECT count(id) AS 'number_articles' FROM articles GROUP BY(user_id)";
    $sentencia_leer_users = $mbd->prepare($query_read_users);
    $sentencia_leer_users->execute();
    $data_user = $sentencia_leer_users->fetchall();
    if($data_user){
        return $data_user;
    }else{
        return $data_user = 0;
    }
}
$number_articles = get_number_article ($mbd);
$number_tasks = get_number_tasks ($mbd);
$data_user = get_table_users($mbd);

