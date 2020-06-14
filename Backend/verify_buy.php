<?php 
include("conexion.php");
function buy($mbd,$user_id){
    $query_read_date = "SELECT ahorrado FROM articles WHERE ahorrado >= price AND user_id = $user_id;";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    return $data_date; 
}
function verify_buy($mbd){
    $id_article = $_GET["article_id"];
    $user_id = $_GET['user_id'];
    echo $id_article;
    // $state = buy($mbd,$user_id);
    // if($state){
    // $sql_buy = "UPDATE articles SET estado = 1 WHERE  user_id = $user_id AND id = $user_id";
    // header("location:../index.php?presupuesto=Mensual");
    // }else{

    // }
}
verify_buy($mbd);
