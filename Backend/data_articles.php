<?php
include("conexion.php");

function get_table_articles ($mbd){
    $query_read_articles = "SELECT * FROM articles";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    return $data_article;
}
function difference_date($mbd){
    $query_read_date = "SELECT  COUNT(id) AS 'notifications_tasks' FROM tasks WHERE DATEDIFF(date_expected,CURDATE()) < 10;";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    return $data_date;
}
function date_expected_month ($mbd){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    $i=0;
    while($data_article[$i]['date_expected'] !== NULL){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 30;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
        $i++; 
    }
    return $data_article;


}