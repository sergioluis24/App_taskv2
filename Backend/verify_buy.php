<?php 
include("conexion.php");
function buy($mbd,$user_id){
    $id_article = $_GET["article_id"];
    $user_id = $_GET['user_id'];

    $sql_buy = "UPDATE articles SET estado = 1 WHERE  user_id = $user_id AND id = $id_article";
    $sentencia_leer_date = $mbd->prepare($sql_buy);
    $sentencia_leer_date->execute();
    echo "entre al buy";
    header("location:../index.php?presupuesto=Mensual");

}
function verify_buy($mbd){
    $id_article = $_GET["article_id"];
    $user_id = $_GET['user_id'];
    // echo $id_article;
    // echo $user_id;
    $query_read_date = "SELECT * FROM articles WHERE id = $id_article AND user_id = $user_id;";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    // var_dump($data_date[0]["price"]);
    if($data_date[0]["ahorrado"] >= $data_date[0]["price"]){
        buy($mbd,$user_id);
    }else{
        echo "entre al else";
        header('location:../index.php?presupuesto=Mensual&error=No tienes fondos suficientes');
    }
    
}
verify_buy($mbd);

