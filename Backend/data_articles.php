<?php
include("conexion.php");

function get_table_articles ($mbd,$user_id){
    $query_read_articles = "SELECT * FROM articles WHERE user_id = $user_id";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    return $data_article;
}
function difference_date($mbd,$user_id){
    $query_read_date = "SELECT  COUNT(id) AS 'notifications_tasks' FROM tasks WHERE DATEDIFF(date_expected,CURDATE()) < 10 AND user_id = $user_id;";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    return $data_date;
}
function date_expected_anual ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 365;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;


}
function date_expected_mounth ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    // $i=0;
    // foreach ($data_article as $data_article_aux) {
    //     $data_article[$i]['date_expected'] = $data_article_aux['date_expected'] / 30;
    //     $data_article[$i]['date_expected'] = round($data_article_aux['date_expected'],0);
    //     $i++;
    // }
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 30;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;


}
function date_expected_quincena ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 15;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;
}
function date_expected_days($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    return $data_article;
}


function calculated_mounth($mbd,$user_id){
    $data_expected = date_expected_mounth ($mbd,$user_id);
    $data_article = get_table_articles ($mbd,$user_id);
    $presupuesto = array();
    foreach ($data_article as $i => $data) {
        # code...
        $data["price"] = $data["price"] - $data["ahorrado"];
        $data = round($data["price"]/$data_expected[$i]["date_expected"],0);
        array_push($presupuesto,$data);
    }
    return $presupuesto;
}
function valid_dropdown($mbd,$user_id){
    if($_GET["presupuesto"]){
        if($_GET["presupuesto"] == "Mensual"){
            $data = date_expected_mounth($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Quincenal"){
            $data = date_expected_quincena($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Anual"){
            $data = date_expected_anual ($mbd,$user_id);
            return $data;
        }
    }
}